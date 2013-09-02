<?php

class DonationHistoryController extends AppController
{

    var $layout = 'document';

    var $paginate = array(
        'limit' => 10
    );
    
    public function index()
    {
        $sessUser = $this->Session->read('Auth.User');
        $this->loadModel('User');
        $id = $sessUser['id'];

        $this->set('donationitems', $this->DonationHistory->find('all', array(
            'conditions' => array('DonationHistory.user_id' => $id))
        ));
    }
    
    public function listing()
    {
        $category = '';
        if (isset($this->request->query['cat'])) {
            $category = $this->request->query['cat'];
        }
        
        $this->set('category', $category);
        
        if ($category) {
            $this->set('donationitems', $this->DonationHistory->find('all', array(
                'conditions' => array('DonationHistory.donation_type' => $category))
            ));
        }
        else {
            $this->set('donationitems', $this->DonationHistory->find('all'));
        }
        
    }
    
    public function view($id)
    {
        $this->DonationHistory->id = $id;
        $donation = $this->DonationHistory->find('all', array(
            'conditions' => array('DonationHistory.sponsee_id' => $id),
            'order' => array('DonationHistory.category_id')
        ));
        $this->set("donationdetails", $donation);
    }
}
