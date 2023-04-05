<table class="item_class_0"  >
    <thead >
    <tr >
        <th >
            #
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

        <th >
            Action
        </th>
    </tr>
    </thead>
    <tbody >

    <?php if(!empty($playlists)): ?>
        <?php foreach ($playlists as $row): ?>
            <tr >
                <th >
                    <?=$row->id?>
                </th>
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
                    <button class="class_24"  >
                        Edit
                    </button>
                    <button class="class_25"  >
                        Delete
                    </button>
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
