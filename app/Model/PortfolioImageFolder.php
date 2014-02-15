<?php

/*
 * @author jaycverg
 */

class PortfolioImageFolder extends AppModel
{

    public $validate = array(
        "name" => array(
            "required" => array(
                "rule" => array("notEmpty"),
                "message" => "Name is required"
            )
        )
    );
    
    // this should be hasMany because
    // a portfolio can contain many Image
    var $hasMany = array(
        'Images' => array(
            'className' => 'PortfolioImage',
            'foreignKey' => 'folder_id',
            'dependent' => true,
            // the 'image' field is not required here
            'fields' => array('id', 'portfolio_id', 'description', 'created')
        )
    );

}
