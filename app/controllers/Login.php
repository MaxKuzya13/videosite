<?php

namespace Controller;

use Model\Request;
use Model\Session;
use Model\User;

defined('ROOTPATH') OR exit ('Access Denied');
// Login class

class Login
{
    use MainController;

    public function index()
    {
        $req = new Request();
        $ses = new Session();
        $user = new User();

        if($req->posted())
        {
            $post = $req->post();

            $row = $user->first(['email' => $post['email']]);
            if($row)
            {
                if(password_verify($post['password'], $row->password))
                    {
                        $ses->auth($row);
                        if($row->role == 'admin')
                            redirect('admin');

                        redirect('home');
                    }else{
                        message('Wrong email or password');
                }
            } else {
                message('Wrong email or password');
            }


        }
        $this->view('login');
    }
}
