<?php

namespace Controller;

use Model\Image;
use Model\Playlist;
use Model\Request;
use Model\Session;
use Model\Video as myVideo;

defined('ROOTPATH') OR exit ('Access Denied');
// Ajax class

class Ajax
{
    use MainController;

    public function index()
    {
        $ses = new Session();
        $req = new Request();
        $video = new myVideo();
        $playlist = new Playlist();

        if($ses->user('role') != 'admin')
            die;

        $data = $req->post();
        $info['success'] = false;
        $info['errors'] = [];

        if($req->posted() && !empty($data['data_type']))
        {
            $info['data_type'] = $data['data_type'];

            if($video->validate($data))
            {

                if($data['data_type'] == 'new_video')
                {
                    $folder = 'uploads/';
                    if(!file_exists($folder))
                    {
                        mkdir($folder, 0777, true);
                    }
                    $data['image'] = $folder . time() . $_FILES['image']['name'];
                    $data['file'] = $folder . time() . $_FILES['file']['name'];

                    move_uploaded_file($_FILES['image']['tmp_name'], $data['image']);
                    move_uploaded_file($_FILES['file']['tmp_name'], $data['file']);

                    $image = new Image();
                    $image->resize($data['image'], 1000);

                    $video->insert($data);
                    $info['success'] = true;
                }
            } else {
                $info['errors'] = $video->errors;
            }

        }

        echo json_encode($info);
    }
}
