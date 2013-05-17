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
    
    public $validate = array(
        "description" => array(
            "valid" => array(
                "rule" => array("notEmpty"),
                "message" => "A description is required"
            )
        ),
        "neededamount" => array(
            "valid" => array(
                "rule" => array("notEmpty"),
                "message" => "A needed amount is required"
            )
        )
    );
}

