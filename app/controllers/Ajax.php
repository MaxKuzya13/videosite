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

        $folder = 'uploads/';
        if(!file_exists($folder))
        {
            mkdir($folder, 0777, true);
        }

        if($req->posted() && !empty($data['data_type']))
        {
            $info['data_type'] = $data['data_type'];
            $video_added = false;
            $image_added = false;

            // validate image and file
            if(!empty($_FILES['image']['name']))
            {
                $allowed = ['image/jpeg', 'image/png', 'image/webp'];
                if(!in_array($_FILES['image']['type'], $allowed))
                {
                    $info['errors'][] = "Image format not supported";
                }
                $image_added = true;

            }
            if(!empty($_FILES['file']['name']))
            {
                $allowed = ['video/mp4'];
                if(!in_array($_FILES['file']['type'], $allowed))
                {
                    $info['errors'][] = "Video format not supported";
                }
                $video_added = true;
            }
            if($data['data_type'] == 'new_video')
            {

                if($video->validate($data) && empty($info['errors']))
                {

                    $data['image'] = $folder . time() . $_FILES['image']['name'];
                    $data['file'] = $folder . time() . $_FILES['file']['name'];
                    $data['date'] = date("Y-m-d H:i:s");
                    $data['slug'] = $video->create_slug($data['title']);

                    while($video->first(['slug'=>$data['slug']])){
                        $data['slug'] = $data['slug'] . rand(10000, 999999);
                    }


                    move_uploaded_file($_FILES['image']['tmp_name'], $data['image']);
                    move_uploaded_file($_FILES['file']['tmp_name'], $data['file']);

                    $image = new Image();
                    $image->resize($data['image'], 1000);

                    $video->insert($data);
                    $info['success'] = true;
                } else {
                    $info['errors'] = $video->errors;
                }
            }else
            if($data['data_type'] == 'edit_video')
            {
                if($video->validate($data) && empty($info['errors']))
                {

                    if($image_added)
                    {
                        $data['image'] = $folder . time() . $_FILES['image']['name'];
                        move_uploaded_file($_FILES['image']['tmp_name'], $data['image']);
                        $image = new Image();
                        $image->resize($data['image'], 1000);

                        //delete old image
                        $row = $video->first(['id'=>$data['id']]);
                        if($row)
                        {
                            if(file_exists($row->image))
                                unlink($row->image);
                        }
                    }
                    if($video_added)
                    {
                        $data['file'] = $folder . time() . $_FILES['file']['name'];
                        move_uploaded_file($_FILES['file']['tmp_name'], $data['file']);

                        //delete old file
                        $row = $video->first(['id'=>$data['id']]);
                        if($row)
                        {
                            if(file_exists($row->file))
                                unlink($row->file);
                        }
                    }

                    $video->update($data['id'], $data);
                    $info['success'] = true;
                } else {
                    $info['errors'] = $video->errors;
                }
            }else
                if($data['data_type'] == 'delete_video')
                {
                    //delete old files
                    $row = $video->first(['id'=>$data['id']]);
                    if($row)
                    {
                        if(file_exists($row->image))
                            unlink($row->image);

                        if(file_exists($row->file))
                            unlink($row->file);
                    }

                    $video->delete($row->id,);
                    $info['success'] = true;

                }else
                if($data['data_type'] == 'new_playlist' && empty($info['errors']))
                {
                    if($playlist->validate($data))
                    {
                        $data['image'] = $folder . time() . $_FILES['image']['name'];
                        $data['slug'] = $playlist->create_slug($data['playlist_name']);

                        while($playlist->first(['slug'=>$data['slug']])){
                            $data['slug'] = $data['slug'] . rand(10000, 999999);
                        }

                        move_uploaded_file($_FILES['image']['tmp_name'], $data['image']);

                        $image = new Image();
                        $image->resize($data['image'], 1000);

                        $playlist->insert($data);
                        $info['success'] = true;
                    } else {
                        $info['errors'] = $playlist->errors;
                    }
                }
        }

        echo json_encode($info);
    }
}
