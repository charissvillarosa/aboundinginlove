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
        )
    );
}