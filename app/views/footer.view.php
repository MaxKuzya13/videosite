<?php $ses = new \Model\Session(); ?>

<div class="class_1" >
    <div class="class_26" >
        <img src="<?=ROOT?>/assets/images/vendor-5.jpg" class="class_3" >
        <h1  class="class_27" >
            My Video Website
        </h1>
        <div  class="class_28" >
            Copyright 2023. All rights reserved
        </div>
    </div>
    <div class="class_29" >
        <h4  class="class_30" >
            Quick links:
        </h4>
        <a href="#"  class="class_31" >
            Home
        </a>
        <a href="#"  class="class_32" >
            Latest
        </a>
        <a href="#"  class="class_32" >
            Popular
        </a>
    </div>
    <div class="class_29" >
        <h4  class="class_30" >
            User links:
        </h4>
        <?php if($ses->is_logged_in() && $ses->user('role') == 'admin'):?>
            <a href="<?=ROOT?>/admin"  class="class_31" >
                Admin
            </a>
        <?php endif; ?>
        <?php if($ses->is_logged_in()):?>
            <a href="<?=ROOT?>/logout"  class="class_32" >
                Logout
            </a>
        <?php else: ?>
            <a href="<?=ROOT?>/login"  class="class_32" >
            Login
            </a>
            <a href="<?=ROOT?>/signup"  class="class_32" >
                Signup
            </a>
        <?php endif; ?>
    </div>
    <div class="class_29" >
        <h4  class="class_30" >
            More links:
        </h4>
        <?php if($ses->is_logged_in() && $ses->user('role') == 'admin'):?>
        <a href="<?=ROOT?>/video/new"  class="class_31" >
            Upload video
        </a>
        <a href=""<?=ROOT?>/playlist/new"  class="class_32" >
            New Playlist
        </a>
        <?php endif; ?>
    </div>
</div>
</section>

</body>
</html>

