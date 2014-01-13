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
        )
    );
}

