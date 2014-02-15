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
        )
    );

    // this should be hasMany because
    // a portfolio can contain many Image
    var $hasMany = array(
        'Folders' => array(
            'className' => 'PortfolioImageFolder',
            'foreignKey' => 'portfolio_id',
            'dependent' => true
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

