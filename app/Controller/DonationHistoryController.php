<?php

class DonationHistoryController extends AppController
{

    var $layout = 'document';

    var $uses = array('User', 'DonationHistory','DonationRequest');
    
    var $paginate = array(
        'limit' => 10
    );
    
    public function index()
    {
        $sessUser = $this->Session->read('Auth.User');
        $this->loadModel('User');
        $id = $sessUser['id'];

        $this->loadModel('SponseeNeed');

        $this->loadModel('SponseeListingItem');
        $this->set("sponseeList", $this->paginate('SponseeListingItem'));

        //table display onetime donations
        $this->set('onetimedonationitems', $this->paginate('DonationHistory', array(
            'DonationHistory.user_id' => $id,
            'DonationRequest.no_of_months <=' => 1
        )));
        //table display monthly donations
        $this->set('monthlydonationitems', $this->paginate('DonationHistory', array(
            'DonationHistory.user_id' => $id,
            'DonationRequest.no_of_months >' => 1
        )));

        //for loop value on queued table
        $this->set('queueditems', $this->paginate('DonationRequest', array(
            'DonationRequest.user_id' => $id,
            'DonationRequest.months_completed >' => 0,
            'DonationRequest.months_completed < DonationRequest.no_of_months'
        )));

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
    
    public function view($id)
    {
        $this->DonationHistory->id = $id;
        $donation = $this->DonationHistory->find('all', array(
            'conditions' => array('DonationHistory.id' => $id)
        ));
        $this->set("donationdetails", $donation);
    }
}
