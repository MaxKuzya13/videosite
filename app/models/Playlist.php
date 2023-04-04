<?php

namespace Model;

defined('ROOTPATH') OR exit('Access Denied!');

/**
 * Playlist class
 */
class Playlist
{

    use Model;

    protected $table = 'playlists';

    protected $allowedColumns = [

        'playlist_name',
        'slug',
        'image',
    ];

    public function validate($data)
    {
        $this->errors = [];

        if(empty($data['playlist_name']))
        {
            $this->errors['playlist_name'] = "Playlist name is required";
        }else
            if(!preg_match("/^[a-zA-Z]+$/", trim($data['playlist_name'])))
            {
                $this->errors['playlist_name'] = "Playlists name can only have letters & spaces";
            }


        if(empty($this->errors))
        {
            return true;
        }

        return false;
    }


}