<?php

namespace Controller;

use Model\Request;
use Model\Session;
use Model\Video as myVideo;

defined('ROOTPATH') OR exit ('Access Denied');
// Video class

class Video
{
    use MainController;

    public function index()
    {
        $ses = new Session();
        $req = new Request();
        $video = new myVideo();

        if($ses->user('role') != 'admin')
            redirect('login');

        $this->view('video');
    }
}
