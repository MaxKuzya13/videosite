<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?=ucfirst(URL('page'))?> | <?=APP_NAME?></title>
    <link rel="stylesheet" type="text/css" href="<?=ROOT?>/assets/css/bootstrap-icons.css">
    <link rel="stylesheet" type="text/css" href="<?=ROOT?>/assets/css/styles.css?2173">
</head>
<body>

<div class="class_1" >
    <div class="class_2" >
        <img src="<?=ROOT?>/assets/images/vendor-5.jpg" class="class_3" >
    </div>
    <div class="class_4" >
        <div class="class_5" >
            <div class="class_6" >
                <h1  class="class_7" >
                    My Video Website
                </h1>
            </div>
            <div class="class_8" >
                <i class="bi bi-facebook class_9">
                </i>
                <i  class="bi bi-twitter class_9">
                </i>
                <i  class="bi bi-youtube class_9">
                </i>
            </div>
        </div>
        <div class="class_10" >
            <a href="<?=ROOT?>"  class="<?=(URL('page') == 'home') ? 'class_11' : 'class_12'?>" >
                Home
            </a>
            <a href="<?=ROOT?>/latest"  class="<?=(URL('page') == 'latest') ? 'class_11' : 'class_12'?>" >
                Latest
            </a>
            <a href="<?=ROOT?>/popular"  class="<?=(URL('page') == 'popular') ? 'class_11' : 'class_12'?>" >
                Popular
            </a>
            <a href="<?=ROOT?>/playlists"  class="<?=(URL('page') == 'playlist') ? 'class_11' : 'class_12'?>" >
                Playlists
            </a>
        </div>
    </div>
</div>
