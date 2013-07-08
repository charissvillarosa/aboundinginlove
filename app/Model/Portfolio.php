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
        'Images' => array(
            'className' => 'PortfolioImage',
            'foreignKey' => 'portfolio_id',
            
            // the 'image' field is not required here
            'fields' => array('id', 'portfolio_id', 'description', 'date_uploaded')
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

