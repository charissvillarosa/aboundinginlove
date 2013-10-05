<?php

App::uses("AuthComponent ", "Controller/Component");

/**
 * CakePHP User
 * @author chariss
 */
class SponseeDonationItem extends AppModel
{

    var $belongsTo = array(
        'SponseeNeed' => array(
            'className' => 'SponseeNeed',
            'foreignKey' => 'sponsee_need_id'
        )
    );

}
