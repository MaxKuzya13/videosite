<?php

namespace Model;

defined('ROOTPATH') OR exit('Access Denied!');

/**
 * Video class
 */
class Video
{

    use Model;

    protected $table = 'videos';

    protected $allowedColumns = [

        'title',
        'image',
        'file',
        'playlist_id',
        'date',
        'slug',
        'views',
        'popularity',
        'description',
    ];

    public function validate($data)
    {
        $this->errors = [];


        if(empty($data['title']))
        {
            $this->errors['title'] = "Video title is required";
        }else
            if(!preg_match("/^[a-zA-Z]+$/", trim($data['title'])))
            {
                $this->errors['title'] = "Video title can only have letters & spaces";
            }


        if(empty($this->errors))
        {
            return true;
        }

        return false;
    }


}