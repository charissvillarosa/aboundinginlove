<?php

/*
 * @author Chariss
 */
class SponseeListingItem extends AppModel 
{
    var $useTable = 'sponsee_listing';

    var $hasOne = array(
        'Image' => array(
            'className' => 'SponseeImage',
            'foreignKey' => 'id',
            'dependent' => true,
            // the 'image' field is not required here
            'fields' => array('hash_key')
        )
    );
}

