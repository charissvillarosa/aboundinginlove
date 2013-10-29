<?php

App::uses("AuthComponent ", "Controller/Component");

/**
 * @author chariss
 */
class SponseeNeed extends AppModel
{
    var $belongsTo = array(
        'Category' => array(
            'className' => 'SponseeNeedCategory',
            'foreignKey' => 'category_id'
        ),
        'AddedBy' => array(
            'className' => 'User',
            'foreignKey' => 'added_by'
        )
    );
    
    public $validate = array(
        "description" => array(
            "valid" => array(
                "rule" => array("notEmpty"),
                "message" => "A description is required"
            )
        ),
        "donationmethod" => array(
            "valid" => array(
                "rule" => array("notEmpty"),
                "message" => "A Donation method is required"
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

