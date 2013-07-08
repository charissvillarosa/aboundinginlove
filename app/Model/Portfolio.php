<?php

App::uses("AuthComponent ", "Controller/Component");

/**
 * @author chariss
 */
class Portfolio extends AppModel
{
    var $belongsTo = array(
        'Category' => array(
            'className' => 'PortfolioCategory',
            'foreignKey' => 'category_id'
        ),
        'Image' => array(
            'className' => 'PortfolioImage',
            'foreignKey' => 'category_id'
        )
    );
    
    public $validate = array(
        "description" => array(
            "required" => array(
                "rule" => array("notEmpty"),
                "message" => "A description is required"
            )
        )
    );
}

