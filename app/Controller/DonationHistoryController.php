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
        $sessUser = $this->Session->read('Auth.User');
        $this->loadModel('User');
        $id = $sessUser['id'];

        $this->set('donationitems', $this->DonationHistory->find('all'));
    }
    
    public function search()
    {

        if (!empty($this->data)) {
            $type = $this->data['Donationrequest']['cat'];
        }

        $this->set('donationitems', $this->DonationHistory->find('all', array(
            'conditions' => array('DonationRequest.type' => $type))
        ));
    }
}
