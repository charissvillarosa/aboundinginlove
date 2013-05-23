<?php

/*
 * @author Chariss
 */
class Sponsee extends AppModel 
{
   public $validate = array(
        "firstname" => array(
            "required" => array(
                "rule" => array("notEmpty"),
                "message" => "A first name is required"
            )
        ),
        "middlename" => array(
            "required" => array(
                "rule" => array("notEmpty"),
                "message" => "A middle name is required"
            )
        ),
        "lastname" => array(
            "valid" => array(
                "rule" => array("notEmpty"),
                "message" => "A middle name is required"
            )
        ),
        "address" => array(
            "valid" => array(
                "rule" => array("notEmpty"),
                "message" => "A address is required"
            )
        ),
        "country" => array(
            "valid" => array(
                "rule" => array("notEmpty"),
                "message" => "A country is required"
            )
        ),
        "maplocation" => array(),
        "information" => array(
            "valid" => array(
                "rule" => array("notEmpty"),
                "message" => "A information is required"
            )
        ),
        "birthdate" => array(
            "valid" => array(
                "rule" => array("notEmpty"),
                "message" => "A map birth date is required"
            )
        )
    ); 
}

