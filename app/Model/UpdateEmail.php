<?php

/*
 * @author Chariss
 */
class UpdateEmail extends AppModel
{

   var $hasOne = array(
        'Image' => array(
            'className' => 'SponseeImage',
            'foreignKey' => 'id',
            'dependent' => true,
            // the 'image' field is not required here
            'fields' => array('hash_key')
        )
    );

   var $belongsTo = array(
        'Sponsee' => array(
            'className' => 'Sponsee',
            'foreignKey' => 'sponsee_id'
        ),
       'Donationrequest' => array(
            'className' => 'DonationRequest',
            'foreignKey' => 'sponsee_id'
        ),
       'User' => array(
            'className' => 'User',
            'foreignKey' => 'donor'
        ),
       'SponseeListingItem' => array(
            'className' => 'SponseeListingItem',
            'foreignKey' => 'sponsee_id'
        ),
       'Portfolio' => array(
            'className' => 'Portfolio',
            'foreignKey' => 'sponsee_id'
        ),
       'DonationHistory' => array(
            'className' => 'Portfolio',
            'foreignKey' => 'paypal_txn'
        )
    );
}