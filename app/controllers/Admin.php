<?php

namespace Controller;

use Model\Session;


defined('ROOTPATH') OR exit ('Access Denied');
// Admin class

class Admin
{
    use MainController;

    public function index()
    {
        $ses = new Session();
        $video = new \Model\Video;

        $limit = 24;
        $data['videos'] = $video->query("select v.*, p.playlist_name, p.slug as playlist_slug from videos as v join playlists as p on v.playlist_id = p.id order by v.id desc limit $limit");

        $this->view('admin', $data);
    }
}
