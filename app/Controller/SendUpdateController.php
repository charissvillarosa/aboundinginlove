<?php
App::uses('CakeEmail', 'Network/Email');

class SendUpdateController extends AppController
{

    var $layout = 'document';
    var $adminActions = array('listing', 'index', 'email', 'sendemail');
    var $uses = array('UpdateEmail', 'User', 'DonationHistory','DonationRequest', 'Sponsee');
    
    var $paginate = array(
        'limit' => 10
    );

    public function __construct($request = null, $response = null)
    {
        parent::__construct($request, $response);

        $this->Email = new CakeEmail();
        $this->Email->config(array(
            'host' => 'smtp.avare-llc.com',
            'port' =>'587',
            'username' => 'aboundinginlove@avare-llc.com',
            'password' =>'Avare123',
            'transport' => 'Smtp'
        ));
        $this->Email->from(array('aboundinginlove@avare-llc.com'=>'AboundingInLove.org'));
    }

    public function index(){

    }
    
    public function listing()
    {
        $category = '';
        if (isset($this->request->query['cat'])) {
            $category = $this->request->query['cat'];
        }
        
        $this->set('category', $category);

        if ($category) {
            $this->set('donationitems', $this->paginate('DonationHistory', array(
                'DonationHistory.donation_type' => $category
            )));
        }
        else {
            $this->set('donationitems', $this->paginate('DonationHistory'));
        }
         
    }

    public function email($donor, $donation, $sponsee){
        if (!$this->request->is('post')) {
            $result = $this->DonationHistory->find('all', array(
                'conditions' => array(
                    'DonationHistory.user_id' => $donor,
                    'DonationHistory.id' => $donation,
                    'DonationHistory.sponsee_id' => $sponsee
                )
            ));
            $this->set('result', $result);
        }  
    }

    public function sendemail(){
        if (!$this->request->is('post')) {
            $this->redirect(array('action' => 'listing'));
        }
        else {
            $postData = $this->request->data['SendUpdate'];
            $toArray = explode(',', $postData['to']);
            
            foreach ($toArray as $emailTo) {
                $emailTo = trim($emailTo);

                try {
                    //sending email
                    $this->Email->to($emailTo);
                    $this->Email->subject("Thank you from Abounding in Love");
                    $this->Email->emailFormat('html');
                    $this->Email->template('sendupdate');
                    $this->Email->viewVars(array(
                        'paypal_paymentdate' => $postData['paypal_paymentdate'],
                        'donor' => $postData['donorname'],
                        'donation' => $postData['donation'],
                        'to' => $emailTo,
                        'sponseeid' => $postData['sponsee'],
                        'sponseename' => $postData['sponseename'],
                        'message' => $postData['message']

                    ));
                    $this->Email->send();

                    //saving email content into send update
                    $this->UpdateEmail->create();
                    $this->UpdateEmail ->set('paypal_txn', $postData['paypal_txn']);
                    $this->UpdateEmail->set('donor', $postData['donor']);
                    $this->UpdateEmail->set('to', $emailTo);
                    $this->UpdateEmail->set('sponsee_id', $postData['sponsee']);
                    $this->UpdateEmail->set('message', $postData['message']);

                    $this->UpdateEmail->save();
                }
                catch(Exception $e) {
                    $this->log($e->getMessage(), 'email');
                }
            }

            $this->Session->setFlash('Email has been sent successfully.');
            $this->redirect(array('action' => 'listing'));
        }
    }
 }
