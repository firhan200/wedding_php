<h3>Dashboard</h3>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>Name</th>
            <th>Action</th>
            <th>Created At</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach($latest_logs as $log){
            echo '<tr>';    
            echo '<td><a href="'.site_url('/admin/guest/addedit/'.$log->guest_id).'">'.htmlspecialchars($log->name).'</a></td>';    
            echo '<td>'.htmlspecialchars($log->action).'</td>';    
            echo '<td>'.htmlspecialchars($log->created_at).'</td>';    
            echo '<td>';
            echo '<a href="'.site_url('/admin/log/index?guest_id='.$log->guest_id).'" class="btn btn-success">View Logs</a>';
            echo '</td>';    
            echo '</tr>';    
        }
        ?>
    </tbody>
</table>