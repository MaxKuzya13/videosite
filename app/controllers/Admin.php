<?php

namespace Controller;


use Model\Pager;
use Model\Session;


defined('ROOTPATH') OR exit ('Access Denied');
// Admin class

class Admin
{
    use MainController;

    public function index()
    {
        $ses = new Session();
        $data['ses'] = $ses;

        $video = new \Model\Video;

        // get admins
        $query = "select count(*) as total from users where role = 'admin'";
        $data['admins'] = $video->query($query);

        // get users
        $query = "select count(*) as total from users where role = 'user'";
        $data['users'] = $video->query($query);

        // get videos
        $query = "select count(*) as total from videos";
        $data['videos'] = $video->query($query);

        // get playlists
        $query = "select count(*) as total from playlists";
        $data['playlists'] = $video->query($query);

        $this->view('admin', $data);
    }

    public function users()
    {
        $ses = new Session();
        $data['ses'] = $ses;

        $user = new \Model\User();

        $limit = 24;
        $pager = new Pager($limit);
        $user->offset = $pager->offset;
        $user->limit = $limit;

        $data['users'] = $user->findAll();
        $data['pager'] = $pager;

        $this->view('admin', $data);
    }

    public function videos()
    {
        $ses = new Session();
        $data['ses'] = $ses;

        $video = new \Model\Video();

        $limit = 24;
        $pager = new Pager($limit);
        $offset = $pager->offset;

        $data['videos'] = $video->query("select v.*, p.playlist_name, p.slug as playlist_slug from videos as v join playlists as p on v.playlist_id = p.id order by v.id desc limit $limit offset $offset");
        $data['pager'] = $pager;

        $this->view('admin', $data);
    }

    public function playlists()
    {
        $ses = new Session();
        $data['ses'] = $ses;

        $playlist = new \Model\Playlist();

        $limit = 24;
        $pager = new Pager($limit);
        $playlist->offset = $pager->offset;
        $playlist->limit = $limit;

        $data['playlists'] = $playlist->findAll();
        $data['pager'] = $pager;

        $this->view('admin', $data);
    }
}
