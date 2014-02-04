<?php

/*
 * @author jaycverg
 */
class DonationRequest extends AppModel 
{
    var $belongsTo = array(
       'Sponsee' => array(
            'className' => 'Sponsee',
            'foreignKey' => 'sponsee_id'
        ),
       'SponseeNeed' => array(
            'className' => 'SponseeNeed',
            'foreignKey' => 'sponsee_need_id',
        ),
        'DonationHistory' => array(
            'className' => 'DonationHistory',
            'conditions' => array('DonationHistory.item_number = DonationRequest.id'),
            'foreignKey' => ''
        )
    );
}

