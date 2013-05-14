<?php

App::uses("AuthComponent ", "Controller/Component");

/**
 * CakePHP User
 * @author chariss
 */
class SponseeNeed extends AppModel
{
    var $belongsTo = array(
        'Category' => array(
            'className' => 'SponseeNeedCategory',
            'foreignKey' => 'category_id'
        )
    );
}

