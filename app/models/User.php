<?php

namespace Model;

defined('ROOTPATH') OR exit('Access Denied!');

/**
 * User class
 */
class User
{

    use Model;

    protected $table = 'users';

    protected $allowedColumns = [

        'username',
        'email',
        'password',
        'role',
        'date_created',
        'date_updated',
    ];

    public function validate($data)
    {
        $this->errors = [];

        if(empty($data['email']))
        {
            $this->errors['email'] = "Email is required";
        }else
            if(!filter_var($data['email'],FILTER_VALIDATE_EMAIL))
            {
                $this->errors['email'] = "Email is not valid";
            }

        if(empty($data['password']))
        {
            $this->errors['password'] = "Password is required";
        }else
            if($data['password'] !== $data['retype_password'])
            {
                $this->errors['password'] = "Passwords do not match";
            }

        if(empty($data['username']))
        {
            $this->errors['username'] = "Username is required";
        }else
            if(!preg_match("/^[a-zA-Z]+$/", trim($data['username'])))
            {
                $this->errors['username'] = "Username can only have letters without spaces";
            }

        if(empty($data['terms']))
        {
            $this->errors['terms'] = "Please accept the terms and conditions";
        }

        if(empty($this->errors))
        {
            return true;
        }

        return false;
    }
}