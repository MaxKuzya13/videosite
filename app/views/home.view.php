<?php $this->view('header'); ?>
<?php ?>
<div class="class_13" >
    <div class="class_14" >
        <div class="class_15" >
            <h1  class="class_16" >
                Learn to Code
            </h1>
            <h1  class="class_17" >
                1,000 hours of&nbsp;
                <div>
                    video tutorials
                </div>
            </h1>
            <div  class="class_18" >
                PHP, Javascript, HTML and CSS tutorials
            </div>
        </div>
    </div>
    <div class="class_19" >
        <img src="assets/images/001_4x.jpg" class="class_20" >
    </div>
</div>
<section class="class_21" >
    <h1  class="class_22" >
        Featured Videos
    </h1>
    <?php if(!empty($videos)): ?>
        <?php foreach($videos as $video): ?>
    <a href="<?=ROOT?>/play/<?=$video->slug?>" class="class_23" >
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