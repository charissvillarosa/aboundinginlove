<?php

/**
 * CakePHP InviteFriend
 * @author chariss
 */
class InviteFriendListing extends AppModel
{
    var $useTable = 'friend_invites';
    
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
            ),
            "kosher" => array(
                "rule" => "email",
                "message" => "Please make sure your email is entered correctly."
            ),
            "required" => array(
                "rule" => "notEmpty",
                "message" => "Please Enter your email."
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

