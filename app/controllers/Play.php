<?php

namespace Controller;

use Model\Session;


defined('ROOTPATH') OR exit ('Access Denied');
// Play class

class Play
{
    use MainController;

    public function index($slug = null)
    {
        $ses = new Session();
        $video_class = new \Model\Video;

        $data['video'] = $video_class->query("select v.*, p.playlist_name, p.slug as playlist_slug from videos as v join playlists as p on v.playlist_id = p.id where v.slug = :slug limit 1", ['slug'=>$slug]);

        $this->view('play', $data);
    }
}
