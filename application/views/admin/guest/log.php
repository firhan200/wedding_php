<h3>Guest Log

<?php
if($guest != null){
    echo ' ('.$guest->name.')';
}
?>

</h3>

<table data-order='[[ 1, "desc" ]]' class="table table-hover" id="guest_table">
    <thead>
        <tr>
            <th>Created At</th>
            <th>Name</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach($list as $data){
            echo '<tr>';
            echo '<td>'.$data->created_at.'</td>';
            echo '<td>'.htmlspecialchars($data->name).'</td>';
            echo '<td>'.$data->action.'</td>';
            echo '</tr>';
        }
        ?>
    </tbody>
</table>