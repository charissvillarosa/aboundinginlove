<?php

/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller
{
    var $uses = array(
        'PaypalTxnLog',
        'SponseeNeed',
        'DonationRequest'
    );

    var $helpers = array('Html', 'Form', 'PaypalIpn.Paypal');
    //public $components = array('DebugKit.Toolbar');

    public $components = array(
        'Cookie',
        'Session',
        'Auth' => array(
            'loginRedirect' => array('controller' => 'dashboard'),
            'logoutRedirect' => array('controller' => 'pages', 'action' => 'index'),
            'authorize' => array('Controller'),
            'authError' => 'You are not logged in. Please login to continue.'
        )
    );

    /**
     * default beforeFilter adds cookie for the browser
     * that never expires for 1 year to serve as its {@link #getAppId()}
     */
    public function beforeFilter()
    {
        parent::beforeFilter();

        if (!$this->Cookie->read('_PHP_')) {
            $key = Security::hash(Security::generateAuthKey(), 'md5');
            $this->Cookie->write('_PHP_', $key, false, '1 year');
        }
    }

    /**
     * @return the cookie value stored during before filter
     */
    public function getAppId()
    {
        return $this->Cookie->read('_PHP_');
    }

    /**
     * default value is authorized all
     * should be overriden for granularity
     *
     * @param $user
     * @return boolean
     */
    public function isAuthorized($user)
    {
        return true;
    }

    public function index()
    {
        // default index
    }

    // paypal IPN callback function
    function afterPaypalNotification($txnId)
    {
        $transaction = ClassRegistry::init('PaypalIpn.InstantPaymentNotification')->findById($txnId);
        $ipnTxn = $transaction['InstantPaymentNotification'];

        $this->log("id: $ipnTxn[id], txn_id: $ipnTxn[txn_id]", 'paypal');

        if ($transaction['InstantPaymentNotification']['payment_status'] == 'Completed') {
            $txnLog = $this->PaypalTxnLog->findById($ipnTxn['txn_id']);
            $donationReq = $this->DonationRequest->findById($ipnTxn['item_number']);
            
            // just get the key-value pairs
            $donationReq = $donationReq['DonationRequest'];
            
            // let update the info if this $txnId is not yet recorded
            // paypal IPN sends notification multiple times
            if (!$txnLog) {
                $this->PaypalTxnLog->create();
                $this->PaypalTxnLog->save(array(
                    'PaypalTxnLog' => array(
                        'id' => $ipnTxn['txn_id'], //from instant_payment_notifications table column txn_id
                        'user_id' => $donationReq['user_id'],
                        'sponsee_id' => $donationReq['sponsee_id'],
                        'details' => $donationReq['details'],
                        'donation_type' => $donationReq['type'],
                        'refno' => $ipnTxn['item_number'], //from instant_payment_notifications table column item_number
                        'first_name' => $ipnTxn['first_name'], 
                        'last_name' => $ipnTxn['last_name'],
                        'payer_email' => $ipnTxn['payer_email'],
                        'payer_id' => $ipnTxn['payer_id'],
                        'payer_status' => $ipnTxn['payer_status'],
                        'contact_phone' => $ipnTxn['contact_phone'],
                        'payment_fee' => $ipnTxn['payment_fee'],
                        'payment_gross' => $ipnTxn['payment_gross'],
                        'amount' => $ipnTxn['payment_gross'] - $ipnTxn['payment_fee'],
                        'payment_date' =>  $ipnTxn['payment_date']
                    )
                ));

                // update sponsee_needs table if donation_type is 'sponsee'
                if ($donationReq['type'] == 'sponsee') {
                    $items = explode(',', $donationReq['details']);
                    $remaining = $ipnTxn['payment_gross'] - $ipnTxn['payment_fee'];

                    foreach ($items as $value) {
                        $item = explode('=', $value);

                        $amount = floatval($item[1]);
                        if ($remaining > $amount) {
                            $remaining = $remaining - $amount;
                        }
                        else {
                            $amount = $remaining;
                            $remaining = 0;
                        }
                        $paypal_id = $ipnTxn['txn_id'];

                        $this->postSponseeNeedDonation($item[0], $amount, $paypal_id);
                    }
                }
            }
        }
        else {
            // I don't know what to do yet.
        }
    }

    // updates a sponsee need donation
    private function postSponseeNeedDonation($id, $amount, $paypal_id)
    {
        $this->SponseeNeed->id = $id;
        $need = $this->SponseeNeed->read();

        $donated = $need['SponseeNeed']['donatedamount'];
        $total = $amount + ($donated ? $donated : 0);

        $this->SponseeNeed->set('donatedamount', $total);
        $this->SponseeNeed->set('status', 'CLOSED');
        $this->SponseeNeed->set('paypal_id', $paypal_id);
        $this->SponseeNeed->save();

        //update pending donation status
        $this->loadModel('SponseeDonation');
        $this->SponseeDonation->set('status', 'CLOSED');
        $this->SponseeDonation->save();
    }

}
