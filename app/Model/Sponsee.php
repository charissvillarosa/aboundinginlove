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
                "rule" => array("inList", array("country")),
                "message" => "A country is required",
                "allowEmpty" => false
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
        ),
        "primaryimage" => array(
            "valid" => array(
                "rule" => array("Empty"),
                "message" => "A primary id is required"
            )
        )
    ); 
}

