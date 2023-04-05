<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin | <?=APP_NAME?></title>
    <link rel="stylesheet" type="text/css" href="<?=ROOT?>/assets_page/css/bootstrap-icons.css">
    <link rel="stylesheet" type="text/css" href="<?=ROOT?>/assets_page/css/styles.css">
</head>
<body>


<?php
    $title = URL(1) ?? 'dashboard';

?>
<div class="class_1" >
    <div class="class_2" >
        <div class="class_3" >
            <img src="<?=ROOT?>/assets_page/images/57.png" class="class_4" >
            <h1 class="class_5"  >
                <?=$ses->user('username')?>
            </h1>
        </div>
        <a href="<?=ROOT?>/admin" class="class_6">
            <div class="class_7" >
                <div class="<?=($title == 'dashboard') ? 'class_8' : 'class_11'?>">
                    Dashboard
                </div>
                <div class="class_9" >
                    <i  class="bi bi-list class_10"></i>
                </div>
            </div>
        </a>
        <a href="<?=ROOT?>/admin/users" class="class_6"  >
            <div class="class_7" >
                <div class="<?=($title == 'users') ? 'class_8' : 'class_11'?>" >
                    Users
                </div>
                <div class="class_9" >
                    <i  class="bi bi-people class_10"></i>
                </div>
            </div>
        </a>
        <a href="<?=ROOT?>/admin/videos" class="class_6"  >
            <div class="class_7" >
                <div class="<?=($title == 'videos') ? 'class_8' : 'class_11'?>" >
                    Videos
                </div>
                <div class="class_9" >
                    <i  class="bi bi-camera-video class_10"></i>
                </div>
            </div>
        </a>
        <a href="#" class="class_6"  >
            <div class="class_7" >
            </div>
        </a>
        <a href="<?=ROOT?>/admin/playlists" class="class_6"  >
            <div class="class_7" >
                <div class="<?=($title == 'playlists') ? 'class_8' : 'class_11'?>" >
                    Playlists
                </div>
                <div class="class_9" >
                    <i  class="bi bi-stickies class_10"></i>
                </div>
            </div>
        </a>
        <a href="<?=ROOT?>" class="class_6"  >
            <div class="class_7" >
                <div class="class_11" >
                    Home Page
                </div>
                <div class="class_9" >
                    <i  class="bi bi-globe-asia-australia class_10"></i>
                </div>
            </div>
        </a>
        <a href="<?=ROOT?>/logout" class="class_6"  >
            <div class="class_7" >
                <div class="class_11" >
                    Logout
                </div>
                <div class="class_9" >
                    <i  class="bi bi-box-arrow-right class_10"></i>
                </div>
            </div>
        </a>
    </div>
    <div class="class_15" >
        <h2 class="class_16"  >
            <?=ucfirst($title)?>
        </h2>

        <?php
        switch($title){
            case 'dashboard':
               $this->view('admin/dashboard', $data);
                break;
            case 'users':
                $this->view('admin/users', $data);
                break;
            case 'playlists':
                $this->view('admin/playlists', $data);
                break;
            case 'videos':
                $this->view('admin/videos', $data);
                break;
            default:
                echo 'Page not found';
                break;
        }
        ?>


    </div>
</div>

</body>
</html>
