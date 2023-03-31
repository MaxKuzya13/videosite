<?php $this->view('header'); ?>

<section class="class_33" >
    <form method="post" class="class_34" >
        <div class="class_35" style="height: auto;" >
            <div class="class_36" >
                <img src="assets/images/vendor-5.jpg" class="class_3" >
                <h1 class="class_37"  >
                    Signup
                </h1>
                <div class="class_38"  >
                    to create your account
                </div>
                <?php if(message()):?>
                    <div style="text-align: center; padding: 1em; background-color: #ffd1d1;color: #a00000">
                        <?=message('', true)?>;
                    </div>
                <?php endif; ?>

                <?php if(!empty($errors)): ?>
                    <div style="text-align: center; padding: 1em; background-color: #ffd1d1;color: #a00000">
                        Please fix the errors
                    </div>
                <?php endif; ?>

                <input value="<?=old_value('username')?>" placeholder="Username" type="username" name="username" class="class_39">
                <?php if(!empty($errors['username'])):?>
                    <div><small style="color: red"><?=$errors['username']?></small></div>
                <?php endif; ?>
                <input value="<?=old_value('email')?>" placeholder="Email" type="email" name="email" class="class_39" >
                <?php if(!empty($errors['email'])):?>
                    <div><small style="color: red"><?=$errors['email']?></small></div>
                <?php endif;?>
                <input value="<?=old_value('password')?>" placeholder="Password" type="password" name="password" class="class_39" >
                <?php if(!empty($errors['password'])):?>
                    <div><small style="color: red"><?=$errors['password']?></small></div>
                <?php endif;?>
                <input placeholder="Retype password" type="password" name="retype_password" class="class_39" >
                <label  >
                    <input value="1" <?=old_value('terms', 1)?> type="checkbox" name="terms"  class="class_40">
                    &nbsp;Accept terms and conditions
                </label>
                <?php if(!empty($errors['terms'])):?>
                    <div><small style="color: red"><?=$errors['terms']?></small></div>
                <?php endif;?>
                <div class="class_38"  >
                   Already have an account? <a href="<?=ROOT?>/login">Login here</a>
                    <br >
                </div>
                <button class="class_41"  >
                    Create account
                </button>
            </div>
        </div>
        <div class="class_42" >
            <h1 class="class_43"  >
                MY VIDEO wEbSITE
                <br >
            </h1>
            <div class="class_44"  >
                Learn to code from thousands of video tutorials
                <br >
            </div>
        </div>
    </form>
</section>
<br><br><br>

<?php $this->view('footer'); ?>
