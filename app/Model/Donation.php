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
   
   public $validate = array(
        
    ); 
}

