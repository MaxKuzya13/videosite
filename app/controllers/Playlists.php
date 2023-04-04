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
        $video = new \Model\Video();

        $playlist->limit = 24;
        $data['playlists'] = $playlist->findAll();

        foreach ($data['playlists'] as $key => $row)
        {
            $video->order_type = 'asc';
            $res = $video->first(['playlist_id'=>$row->id]);
            if($res){
                $data['playlists'][$key]->video = $res;
            }
        }

        $this->view('playlists', $data);
    }
}
