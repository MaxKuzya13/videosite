<?php $this->view('header'); ?>
<style>
    .hide{
        display: none;
    }
</style>
    <section class="class_60" >
        <form onsubmit="submit_form(event)" method="post" enctype="multipart/form-data" class="class_61" >
            <h1 class="class_25" >
                Upload video
            </h1>
            <label>
                <div>Featured Image:</div>
                <img src="<?=get_image()?>" class="class_62" style="cursor: pointer" >
                <input onchange="display_image(event)" type="file" name="image"  class="class_63">
            </label>
            <div class="class_64" >
                <div class="class_65" >
                    <label  class="class_66" >
                        Title:
                    </label>
                    <input value="<?=old_value('title')?>" placeholder="Title" type="text" name="title" class="class_67" >
                </div>

                <div class="class_65" style="flex-direction: column">
                    <label  class="class_66" >
                        Video File:
                    </label>
                    <input onchange="display_video(event)" type="file" name="file" class="class_63" style="display: block;">
                    <br>
                    <video controls width="250" height="100" style="margin-top: 10px">
                        <source src="" type="video/mp4">
                    </video>
                </div>

                <div class="class_68" >
                    <label  class="class_69" >
                        Playlist:
                    </label>
                    <select class="class_70"  name="playlist_id">
                        <option value="">
                            --Select Playlist--
                        </option>
                        <?php if(!empty($playlists)):?>
                            <?php foreach($playlists as $playlist):?>
                                <option value="<?=$playlist->id?>">
                                    <?=$playlist->playlist_name?>
                                </option>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </select>
                </div>
                <div class="class_71" >
                    <label class="class_72" >
                        Description:
                    </label>
                    <textarea placeholder="Description" name="description" class="class_73"><?=old_value('description')?></textarea>
                </div>
            </div>
            <div class="js-prog-holder hide class_74" >
                <div class="js-prog class_75" style="width: 0" >
                    <div>
                        0%
                    </div>
                </div>
            </div>
            <div class="class_76" >
                <button  class="class_77" >
                    Save
                </button>
                <button type="button" class="class_78" >
                    Cancel
                </button>
                <div class="class_79" >
                </div>
            </div>
        </form>
    </section>

<?php $this->view('footer'); ?>

<script>

    let image_added = false;
    let file_added = false;
    let uploading = false;

    function submit_form(e)
    {
        e.preventDefault()

        if(uploading)
        {
            alert("Please wait until the upload is complete");
            return;
        }

        document.querySelector(".js-prog-holder").classList.remove("hide");
        document.querySelector(".js-prog").style.width = "0%";

        let myform = e.currentTarget;
        let inputs = myform.querySelectorAll('input,select,textarea');
        let data = new FormData();
        let optional_fields = ['description', 'playlist_id', 'image', 'file'];

        if(!image_added)
        {
            alert('Please add a valid image');
            return;
        }
        if(!file_added)
        {
            alert('Please add a valid video file');
            return;
        }

        for (let i = inputs.length - 1; i >= 0; i--)
        {
            if(inputs[i].value == '' && !optional_fields.includes(inputs[i].name))
            {
                // empty value
                alert("The field: "+inputs[i].name+" is required!");
                return;
            }
            if(inputs[i].name == 'image' || inputs[i].name == 'file')
            {
                data.append(inputs[i].name, inputs[i].files[0]);
            } else {
                data.append(inputs[i].name, inputs[i].value);
            }
        }

        data.append('data_type', 'new_video');
        uploading = true;
        // send data via ajax
        let xhr = new XMLHttpRequest();

        xhr.upload.addEventListener('progress', function(e){
            let percent = Math.round((e.loaded / e.total) * 100);
            document.querySelector(".js-prog").style.width = percent + "%";
            document.querySelector(".js-prog").children[0].innerHTML = percent + "%";
        });
        xhr.addEventListener('readystatechange', function() {
            if(xhr.readyState == 4)
            {
                if(xhr.status == 200)
                {
                    alert("Uploading complete!");
                    // window.location.reload();
                }else{
                    alert("An error occured");
                }

                console.log(xhr.responseText);
                uploading = false;
            }
        });
        xhr.open('post', '<?=ROOT?>/ajax', true);
        xhr.send(data);
    }

    function display_image(e)
    {
        let allowed = ['image/jpeg', 'image/png', 'image/webp'];
        let file = e.currentTarget.files[0];

        if(!allowed.includes(file.type))
        {
            alert('Only image formats allowed are: '+allowed.toString().replaceAll("image/", ""));
            image_added = false;
            return;
        }

        image_added = true;
        e.currentTarget.parentNode.querySelector("img").src = URL.createObjectURL(file);
    }

    function display_video(e)
    {
        let allowed = ['video/mp4'];
        let file = e.currentTarget.files[0];

        if(!allowed.includes(file.type))
        {
            alert('Only video formats allowed are: '+allowed.toString().replaceAll("video/", ""));
            file_added = false;
            return;
        }

        file_added = true;
        e.currentTarget.parentNode.querySelector("video").src = URL.createObjectURL(file);
    }

</script>
