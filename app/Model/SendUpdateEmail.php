<?php

/*
 * @author Chariss
 */
class SendUpdateEmail extends AppModel
{
   var $useTable = 'update_email';
   
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
            'foreignKey' => 'user_id'
        ),
       'SponseeListingItem' => array(
            'className' => 'SponseeListingItem',
            'foreignKey' => 'sponsee_id'
        )
    );
}