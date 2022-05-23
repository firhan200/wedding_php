<h3>RSVP</h3>

<table class="table table-hover">
    <thead>
        <tr>
            <th>Name</th>
            <th>Message</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach($list as $data){
            echo '<tr>';
            echo '<td>'.htmlspecialchars($data->name).'</td>';
            echo '<td>'.htmlspecialchars($data->message).'</td>';
            echo '<td>'.date('H:i, d M Y', strtotime($data->created_at)).'</td>';
            echo '<td>';
            echo '<a href="'.site_url('/admin/rsvp/delete/'.$data->id).'" onclick="return confirm(`delete data?`)" class="btn btn-danger">Delete</a>';
            echo '</td>';
            echo '</tr>';
        }
        ?>
    </tbody>
</table>