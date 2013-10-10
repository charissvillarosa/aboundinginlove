<?php

class PendingDonationsController extends AppController
{

    var $layout = 'document';
    var $uses = array(
        'User',
        'DonationRequest',
        'SponseeListingItem',
        'SponseeNeed',
        'SponseeDonation',
        'SponseeDonationItem'
    );

    var $paginate = array(
        'SponseeListingItem' => array(
            'limit' => 3
        )
    );

    public function index(){
        
    }
}
