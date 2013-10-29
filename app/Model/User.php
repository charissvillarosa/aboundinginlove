<?php

App::uses("AuthComponent ", "Controller/Component");

/**
 * CakePHP User
 * @author chariss
 */
class User extends AppModel
{
    var $hasOne = array(
        'Image' => array(
            'className' => 'ProfileImage',
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
        "purpose_of_donation" => array(
            "valid" => array(
                "rule" => array("notEmpty"),
                "message" => "A Purpose of donation is required"
            )
        ),
        "email" => array(
            "kosher" => array(
                "rule" => "email",
                "message" => "Please make sure your email is entered correctly."
            ),
            "unique" => array(
                "rule" => "isUnique",
                "message" => "An account with that email already exists."
            ),
            "required" => array(
                "rule" => "notEmpty",
                "message" => "Please Enter your email."
            )
        ),
        "username" => array(
            "required" => array(
                "rule" => array("notEmpty"),
                "message" => "A username is required"
            ),
            "unique" => array(
                "rule" => "isUnique",
                "message" => "Username already exists."
            ),
        ),
        'password' => array(
            'min' => array(
                'rule' => array("notEmpty"),
                'message' => 'Password must be at least 6 characters.'
            ),
            'required' => array(
                'rule' => 'notEmpty',
                'message' => 'Please enter a password.'
            ),
        ),
        'password_confirm' => array(
            'rule' => 'validatePasswdConfirm',
            'message' => 'Passwords do not match'
        ),
        "role" => array(
            "valid" => array(
                "rule" => array("inList", array("admin", "user")),
                "message" => "Please enter a valid role",
                "allowEmpty" => false
            )
        )
    );

    function validatePasswdConfirm($data)
    {
        if ($this->data[$this->alias]['password'] !== $data['password_confirm']) {
            return false;
        }
        return true;
    }

    function beforeSave($options = Array())
    {
        if (isset($this->data[$this->alias]['password'])) {
            $this->data[$this->alias]['password'] = Security::hash($this->data[$this->alias]['password'], null, true);
        }

        if (isset($this->data[$this->alias]['password_confirm'])) {
            unset($this->data[$this->alias]['password_confirm']);
        }

        return true;
    }

//    public function beforeSave($options = array())
//    {
//        if (isset($this->data[$this->alias]['password'])) {
//            $this->data[$this->alias]['password'] = AuthComponent::password($this->data[$this->alias]['password']);
//        }
//        return true;
//    }

}

