<?php

namespace Controller;

use Model\Playlist;
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
        $playlist = new Playlist();

        if($ses->user('role') != 'admin')
            redirect('login');

        $data['playlists'] = $playlist->query("select * from playlists");
        $data['title'] = 'Upload Video';
        $data['data_type'] = 'new_video';


        $this->view('video', $data);
    }

    public function edit($id = null)
    {
        $ses = new Session();
        $req = new Request();
        $video = new myVideo();
        $playlist = new Playlist();

        if($ses->user('role') != 'admin')
            redirect('login');

        $data['title'] = 'Edit Video';
        $data['data_type'] = 'edit_video';
        $data['video'] = $video->first(['id'=>$id]);
        $data['playlists'] = $playlist->query("select * from playlists");

        $this->view('video', $data);
    }

    public function delete($id = null)
    {
        $ses = new Session();
        $req = new Request();
        $video = new myVideo();
        $playlist = new Playlist();

        if($ses->user('role') != 'admin')
            redirect('login');

        $data['title'] = 'Delete Video';
        $data['data_type'] = 'delete_video';
        $data['video'] = $video->first(['id'=>$id]);
        $data['playlists'] = $playlist->query("select * from playlists");

        $this->view('video', $data);
    }
}
