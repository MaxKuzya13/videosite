<?php

namespace Controller;

use Model\Request;
use Model\User;

defined('ROOTPATH') OR exit ('Access Denied');
// Signup class

class Signup
{
    use MainController;

    public function index()
    {
        $data = [];

        $req = new Request();
        if($req->posted())
        {
            $user = new User();

            $post = $req->post();

            if($user->validate($post))
            {
                $post['password'] = password_hash($post['password'], PASSWORD_DEFAULT);
                $post['date_created'] = date("Y-m-d H:i:s");
                $post['role'] = 'user';

                $user->insert($post);

                message('Your account was create. Please login to continue');
                redirect('login');
            }

            $data['errors'] = $user->errors;

        }

        $this->view('signup', $data);
    }
}
