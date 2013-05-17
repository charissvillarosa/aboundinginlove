<?php

App::uses("AuthComponent ", "Controller/Component");

/**
 * CakePHP User
 * @author chariss
 */
class SponseeNeedCategory extends AppModel
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

