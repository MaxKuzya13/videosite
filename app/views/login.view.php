<?php $this->view('header'); ?>

    <section class="class_33" >
        <form method="post" class="class_34" >
            <div class="class_35" style="height: auto;">
                <div class="class_36" >
                    <img src="assets/images/vendor-5.jpg" class="class_3" >
                    <h1 class="class_37"  >
                        Log In
                        <br >
                    </h1>
                    <div class="class_38"  >
                        to use your account
                    </div>

                    <?php if(message()):?>
                        <div style="text-align: center; padding: 1em; background-color: #ffd1d1;color: #a00000">
                            <?=message('', true)?>;
                        </div>
                    <?php endif; ?>

                    <input value="<?=old_value('email')?>" placeholder="Email" type="email" name="email" class="class_39" >

                    <input value="<?=old_value('password')?>" placeholder="Password" type="password" name="password" class="class_39" >


                    <label  >
                        <input type="checkbox" name="remember"  class="class_40">
                        &nbsp;Remember me
                    </label>
                    <div class="class_38"  >
                        Dont have an account? <a href="<?=ROOT?>/signup">Signup here</a>
                    </div>
                    <button class="class_41"  >
                        LOGIN
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