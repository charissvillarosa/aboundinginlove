<?php

class TestController extends AppController
{
    var $autoRender = false;
    
    function index()
    {
        //update donation_request table
        $this->loadModel('DonationRequest');
        $this->DonationRequest->id = 47;
        $this->DonationRequest->set('months_completed', 1);
        $this->DonationRequest->set('last_month_completed', date_parse('06:07:55 Jan 04, 2014 PST'));
        $this->DonationRequest->save();
    }

}
