<?php

namespace Controller;

use Model\Request;

defined('ROOTPATH') OR exit ('Access Denied');
// Signup class

class Signup
{
    use MainController;

    public function index()
    {
        $req = new Request();

        show($req->post());
        $this->view('signup');
    }
}
