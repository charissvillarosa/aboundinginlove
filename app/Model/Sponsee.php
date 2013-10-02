<?php

/*
 * @author Chariss
 */
class Sponsee extends AppModel 
{
   var $belongsTo = array(
        'Country' => array(
            'className' => 'Country',
            'foreignKey' => 'country',
        )
    );

    var $hasOne = array(
        'Image' => array(
            'className' => 'SponseeImage',
            'foreignKey' => 'id',
            'dependent' => true,
            // the 'image' field is not required here
            'fields' => array('hash_key')
        )
    );
   
    public $validate = array(
         "firstname" => array(
             "required" => array(
                 "rule" => array("notEmpty"),
                 "message" => "A first name is required"
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
         "gender" => array(
             "valid" => array(
                 "rule" => array("notEmpty"),
                 "message" => "A gender is required"
             )
         ),
         "maplocation" => array(),
         "videolink" => array(),
         "short_description" => array(
             "valid" => array(
                 "rule" => array("notEmpty"),
                 "message" => "A information is required"
             )
         ),
        "long_description" => array(
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

