<?php

/*
 * @author Chariss
 */
class Donation extends AppModel 
{
   var $belongsTo = array(
        'Category' => array(
            'className' => 'SponseeNeedCategory',
            'foreignKey' => 'category_id'
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
        
    ); 
}

