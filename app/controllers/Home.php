<?php

namespace Controller;

use Model\Session;

defined('ROOTPATH') OR exit ('Access Denied');
// Home class

class Home
{
    use MainController;

    public function index()
    {
        $ses = new Session();
        $this->view('home');
    }
}
