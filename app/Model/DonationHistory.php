<?php

/*
 * @author Chariss
 */
class DonationHistory extends AppModel
{
   var $useTable = 'paypal_txn_logs';
   
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
       'DonationRequest' => array(
            'className' => 'DonationRequest',
            'foreignKey' => 'item_number'
        ),
       'User' => array(
            'className' => 'User',
            'foreignKey' => 'user_id'
        ),
       'SponseeListingItem' => array(
            'className' => 'SponseeListingItem',
            'foreignKey' => 'sponsee_id'
        ),
       'SponseeNeed' => array(
            'className' => 'SponseeNeed',
            'conditions' => array('SponseeNeed.id = DonationRequest.sponsee_need_id'),
            'foreignKey' => ''
       )
    );
}