<?php

App::uses("AuthComponent ", "Controller/Component");

/**
 * CakePHP User
 * @author chariss
 */
class SponseeDonation extends AppModel
{
    var $belongsTo = array(
        'Sponsee' => array(
            'className' => 'Sponsee',
            'foreignKey' => 'sponsee_id',
            'fields' => array('id', 'firstname', 'lastname', 'middlename', 'address')
        )
    );

    var $hasMany = array(
        'Items' => array(
            'className' => 'SponseeDonationItem',
            'foreignKey' => 'parent_id',
            'dependent' => true
        )
    );

}
