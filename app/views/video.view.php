<?php $this->view('header'); ?>

    <section class="class_60" >
        <form method="post" enctype="multipart/form-data" class="class_61" >
            <h1  class="class_25" >
                Upload video
            </h1>
            <img src="<?=ROOT?>/assets/images/pexels-photo-3756774.jpeg" class="class_62" >
            <input type="file" name="image"  class="class_63">
            <div class="class_64" >
                <div class="class_65" >
                    <label  class="class_66" >
                        Title:
                    </label>
                    <input placeholder="Title" type="text" name="title" class="class_67" >
                </div>
                <div class="class_68" >
                    <label  class="class_69" >
                        Playlist:
                    </label>
                    <select class="class_70"  name="playlist_id">
                        <option >
                            --Select--
                        </option>
                        <option >
                            Option 1
                        </option>
                        <option >
                            Option 2
                        </option>
                    </select>
                </div>
                <div class="class_71" >
                    <label class="class_72" >
                        Description:
                    </label>
                    <textarea placeholder="Description" name="description" class="class_73" >
						</textarea>
                </div>
            </div>
            <div class="class_74" >
                <div class="class_75" >
                    <div  style="" >
                        50%
                    </div>
                </div>
            </div>
            <div class="class_76" >
                <button  class="class_77" >
                    Save
                </button>
                <button  class="class_78" >
                    Cancel
                </button>
                <div class="class_79" >
                </div>
            </div>
        </form>
    </section>

<?php $this->view('footer'); ?>