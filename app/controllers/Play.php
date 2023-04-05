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

        $query = "select v.*, p.playlist_name, p.slug as playlist_slug from videos as v join playlists as p on v.playlist_id = p.id where v.slug = :slug limit 1";
        $data['video'] = $video_class->get_row($query, ['slug'=>$slug]);

        if($data['video'])
        {
            // get all videos from the playlist
            $query = "select v.*, p.playlist_name, p.slug as playlist_slug from videos as v join playlists as p on v.playlist_id = p.id where v.playlist_id = :playlist_id";
            $data['related'] =  $video_class->query($query, ['playlist_id'=>$data['video']->playlist_id]);

            if($ses->user('role') != "admin")
            {
                // update views and popularity
                $video_class->query("update videos set views = views + 1 where id = :id limit 1", ['id'=>$data['video']->id]);

                $views = $data['video']->views + 1;
                $seconds = time() - strtotime($data['video']->date);
                $days = floor($seconds / (60*60*24));

                $popularity = $views / $days;
                $video_class->query("update videos set popularity = :popularity  where id = :id limit 1", ['popularity'=>$popularity, 'id'=>$data['video']->id]);
            }

        }

        $data['slug'] = $slug;

        $this->view('play', $data);
    }
}
