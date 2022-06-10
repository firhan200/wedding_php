<h3>Guest</h3>

<div>
    <a href="<?php echo site_url('/admin/guest/addedit') ?>" class="btn btn-danger mb-3">Add</a>
</div>

<table class="table table-hover" id="guest_table">
    <thead>
        <tr>
            <th>Name</th>
            <th>Full Link</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach($list as $data){
            $url = site_url('?token=').htmlspecialchars($data->token);
            echo '<tr>';
            echo '<td>'.htmlspecialchars($data->name).'</td>';
            echo '<td>'.$url.'</td>';
            echo '<td>';
            echo '<a href="javascript:void(0)" data-text="'.htmlspecialchars($data->name).' link copied!" data-value="'.$url.'" class="copy-text btn btn-info me-2">Copy Link</a>';
            echo '<a href="'.site_url('/admin/log/index?guest_id='.$data->id).'" target="_blank" class="copy-text btn btn-success me-2">Logs</a>';
            echo '<a href="'.site_url('/admin/guest/addedit/'.$data->id).'" target="_blank" class="btn btn-light me-2">Edit</a>';
            echo '<a href="'.site_url('/admin/guest/delete/'.$data->id).'" onclick="return confirm(`delete data?`)" class="btn btn-danger">Delete</a>';
            echo '</td>';
            echo '</tr>';
        }
        ?>
    </tbody>
</table>