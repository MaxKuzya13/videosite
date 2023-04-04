<?php $this->view('header'); ?>

<section class="class_21" >
    <h1  class="class_22" >
        Playlists
    </h1>
    <?php if(!empty($playlists)): ?>
        <?php foreach($playlists as $playlist): ?>
    <a href="<?=ROOT?>/play/<?=$playlist->slug?>" class="class_23" >
        <img src="<?=get_image($playlist->image)?>" class="class_24" >
        <h2  class="class_25" >
            <?=esc($playlist->playlist_name)?>
        </h2>
    </a>
        <?php endforeach; ?>
    <?php else: ?>
    <div style="text-align: center; padding: 1em; background-color: #ffd1d1;color: #a00000">
        No playlists found!
    </div>
    <?php endif; ?>

<?php $this->view('footer'); ?>