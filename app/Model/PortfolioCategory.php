<?php

App::uses("AuthComponent ", "Controller/Component");

/**
 * @author chariss
 */
class PortfolioCategory extends AppModel
{
    public $validate = array(
        "description" => array(
            "required" => array(
                "rule" => array("notEmpty"),
                "message" => "A description is required"
            )
        )
    );
}

