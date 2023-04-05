<a href="<?=ROOT?>/video/new">
<button class="class_28"  >
    Add New
</button>
</a>
<table class="item_class_0"  >
    <thead >
    <tr >
        <th >
            #
        </th>
        <th>
            Title
        </th>
        <th>
            Playlist
        </th>
        <th>
            Image
        </th>
        <th>
            Slug
        </th>
        <th>
            Views
        </th>
        <th>
            Popularity
        </th>
        <th>
            Date
        </th>
        <th >
            Action
        </th>
    </tr>
    </thead>
    <tbody >

    <?php if(!empty($videos)): ?>
        <?php foreach ($videos as $row): ?>
            <tr >
                <th >
                    <?=$row->id?>
                </th>
                <td >
                    <?=esc($row->title)?>
                </td>
                <td >
                    <?=esc($row->playlist_name)?>
                </td>
                <td >
                    <img src="<?=get_image($row->image)?>" class="class_23">
                </td>
                <td >
                    <?=($row->slug)?>
                </td>
                <td >
                    <?=($row->views)?>
                </td>
                <td >
                    <?=($row->popularity)?>
                </td>
                <td >
                    <?=get_date($row->date)?>
                </td>
                <td >
                    <a href="<?=ROOT?>/video/edit/<?=$row->id?>">
                        <button class="class_24"  >
                            Edit
                        </button>
                    </a>
                    <a href="<?=ROOT?>/video/delete/<?=$row->id?>">
                        <button class="class_25"  >
                            Delete
                        </button>
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>
    <?php endif;?>
    </tbody>
</table>
<div>
    <style>
        .pagination{
            list-style: none;
            display: flex;
        }
        .page-item{
            padding: 10px;
            background-color: #eee;
        }
        .active > .page-link{
            color: white;
        }
        .active{
            background-color: #3b3bb2;
        }
    </style>
<?php

$pager->display();
?>
</div>

