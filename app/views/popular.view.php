<?php $this->view('header'); ?>

<section class="class_21" >
    <h1  class="class_22" >
        Popular Videos
    </h1>
    <?php if(!empty($videos)): ?>
        <?php foreach($videos as $video): ?>
    <a href="<?=ROOT?>/play/<?=$video->slug?>" class="class_23" >
        <div style="font-size: 50px; position: absolute; color: white;"><i class="bi bi-play"></i></div>
        <img src="<?=get_image($video->image)?>" class="class_24" >
        <h2  class="class_25" >
            <?=esc($video->title)?>
        </h2>
        <h4  class="class_25" >
            <?=esc($video->playlist_name)?>
        </h4>
    </a>
        <?php endforeach; ?>
    <?php else: ?>
    <div style="text-align: center; padding: 1em; background-color: #ffd1d1;color: #a00000">
        No videos found!
    </div>
    <?php endif; ?>

<?php $this->view('footer'); ?>