<?php $this->view('header'); ?>

    <section class="class_60" >
        <form onsubmit="submit_form(event)" method="post" enctype="multipart/form-data" class="class_61" >
            <h1 class="class_25" >
                Upload video
            </h1>
            <label>
                <div>Featured Image:</div>
                <img src="<?=get_image()?>" class="class_62" style="cursor: pointer" >
                <input type="file" name="image"  class="class_63">
            </label>
            <div class="class_64" >
                <div class="class_65" >
                    <label  class="class_66" >
                        Title:
                    </label>
                    <input value="<?=old_value('title')?>" placeholder="Title" type="text" name="title" class="class_67" >
                </div>

                <div class="class_65" >
                    <label  class="class_66" >
                        Video File:
                    </label>
                    <input type="file" name="file" class="class_63" style="display: block;">
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
                    <textarea placeholder="Description" name="description" class="class_73"><?=old_value('description')?></textarea>
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

    var image_added = false;
    var file_added = false:

    function submit_form(e)
    {
        e.preventDefault()

        let myform = e.currentTarget;
        let inputs = myform.querySelectorAll('input, select, textarea');
        let data = new FormData();
        let optional_fields = ['description', 'playlist_id', 'image', 'file'];

        if(!image_added)
        {
            console.log('qq');
            alert('Please add a valid image');
            return;
        }
        if(!file_added)
        {
            alert('Please add a valid video file');
            return;
        }

        for (var i = inputs.length - 1; i >= 0; i--)
        {
            if(inputs[i].value == '' && optional_fields.includes(inputs[i].name))
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
    }

</script>
