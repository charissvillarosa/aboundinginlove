<?php

/*
 * @author Chariss
 */
class Home extends AppModel
{
    var $useTable = 'sponsees';

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

