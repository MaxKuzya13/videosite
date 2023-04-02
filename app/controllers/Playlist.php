<?php

namespace Controller;

use Model\Playlist as myPlaylist;
use Model\Request;
use Model\Session;

defined('ROOTPATH') OR exit ('Access Denied');
// Playlist class

class Playlist
{
    use MainController;

    public function index()
    {
        $ses = new Session();
        $req = new Request();
        $playlist = new myPlaylist();

        if($ses->user('role') != 'admin')
            redirect('login');

        $data = [];

        $this->view('playlist', $data);
    }
}
