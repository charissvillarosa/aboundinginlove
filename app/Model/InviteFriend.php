<?php

/**
 * CakePHP User
 * @author chariss
 */
class InviteFriend extends AppModel
{
    var $useTable = 'invites';
    
    var $belongsTo = array(
        'User' => array(
            'className' => 'User',
            'foreignKey' => 'user_id'
        )
    );
    
    public $validate = array(
        "to" => array(
            "required" => array(
                "rule" => array("notEmpty"),
                "message" => "To is required"
            )
        ),
        "from" => array(
            "valid" => array(
                "rule" => array("notEmpty"),
                "message" => "From is required"
            )
        ),
        "message" => array(
            "valid" => array(
                "rule" => array("notEmpty"),
                "message" => "Message is required"
            )
        )
    );
}

