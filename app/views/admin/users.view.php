<table class="item_class_0"  >
    <thead >
    <tr >
        <th >
            #
        </th>
        <th>
            Username
        </th>
        <th>
            Email
        </th>
        <th>
            Role
        </th>
        <th>
            Date Created
        </th>
        <th>
            Date Updated
        </th>
        <th >
            Action
        </th>
    </tr>
    </thead>
    <tbody >

    <?php if(!empty($users)): ?>
        <?php foreach ($users as $row): ?>
            <tr >
                <th >
                    <?=$row->id?>
                </th>
                <td >
                    <?=esc($row->username)?>
                </td>
                <td >
                    <?=esc($row->email)?>
                </td>
                <td >
                    <?=esc($row->role)?>
                </td>
                <td >
                    <?=get_date($row->date_created)?>
                </td>
                <td >
                    <?=get_date($row->date_updated)?>
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
