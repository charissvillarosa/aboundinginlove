<?php

class SendUpdateEmailController extends AppController
{

    var $layout = 'document';

    var $uses = array('User', 'DonationHistory','DonationRequest');
    
    var $paginate = array(
        'limit' => 10
    );
    
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
 }
