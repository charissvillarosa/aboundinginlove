<?php

/*
 * @author Chariss
 */

class PortfolioImage extends AppModel
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

 