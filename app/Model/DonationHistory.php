<?php

/*
 * @author Chariss
 */
class DonationHistory extends AppModel 
{
   var $useTable = 'paypal_txn_logs';
   
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
        )
    );
}