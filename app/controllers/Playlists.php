<?php

namespace Controller;

use Model\Session;
use Model\Playlist;


defined('ROOTPATH') OR exit ('Access Denied');
// Playlists class

class Playlists
{
    use MainController;

    public function index()
    {
        $ses = new Session();
        $playlist = new Playlist();

        $playlist->limit = 24;
        $data['playlists'] = $playlist->findAll();

        $this->view('playlists', $data);
    }
}
