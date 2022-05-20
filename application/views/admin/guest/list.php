<h3>Guest</h3>

<div>
    <a href="<?php echo site_url('/admin/guest/addedit') ?>" class="btn btn-danger mb-3">Add</a>
</div>

<table class="table table-hover">
    <thead>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Link</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach($list as $data){
            echo '<tr>';
            echo '<td>'.htmlspecialchars($data->name).'</td>';
            echo '<td>'.htmlspecialchars($data->email).'</td>';
            echo '<td>'.htmlspecialchars($data->token).'</td>';
            echo '<td>';
            echo '<a href="'.site_url('/admin/guest/addedit/'.$data->id).'" class="btn btn-light me-2">Edit</a>';
            echo '<a href="'.site_url('/admin/guest/delete/'.$data->id).'" onclick="return confirm(`delete data?`)" class="btn btn-danger">Delete</a>';
            echo '</td>';
            echo '</tr>';
        }
        ?>
    </tbody>
</table>