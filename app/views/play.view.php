<?php $this->view('header'); ?>

    <?php if(!empty($video)): ?>
        <div class="class_45" >
            <div class="class_46" >
                <video controls="" class="class_47" >
                    <source src="<?=ROOT?>/<?=$video->file?>" type="video/mp4" >
                </video>
            </div>
        </div>
        <div class="class_1" >
            <div class="class_48" >
                <h1  class="class_49" >
                    <?=esc($video->title)?>
                </h1>
                <div  class="class_28" >
                    <?=nl2br($video->description)?>
                </div>
            </div>
            <div class="class_51" >
                <h2  class="class_25" >
                    <?=esc($video->playlist_name)?>
                </h2>
                <?php if(!empty($related)):?>
                    <?php foreach($related as $video):?>
                        <div class="class_52" >
                            <div class="class_53" >
                                <img src="<?=get_image($video->image)?>" class="class_54" >
                            </div>
                            <div class="class_55" style="<?=$video->slug == $slug ?  'background: rgb(189, 205, 186);' : ''?>" >
                                <h4  class="class_56" >
                                    <?=esc($video->title)?>
                                </h4>
                                <div  class="class_57" style="padding-left: 10px; padding-right: 10px;" >
                                    <?=esc($video->slug == $slug ? 'Now Playing' : $video->playlist_name)?>
                                </div>
                            </div>
                            <div class="class_58" >
                                <a href="<?=ROOT?>/play/<?=$video->slug?>">
                                <i class="bi bi-play-btn-fill class_59"></i>
                                </a>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div><
    <?php else: ?>
        <div style="text-align: center; padding: 1em; background-color: #ffd1d1;color: #a00000">
            That video was not found!
        </div>
    <?php endif; ?>

    <br><br>

<?php $this->view('footer'); ?>