<?php
 
include('../includes/db.php');

?>
<table>
<thead>
    <tr>
        <th>id</th>
        <th>Titel</th>
        <th>inhoud</th>
        <th>&nbsp;</th>
    </tr>
</thead>
<tbody>
    <?php
    foreach($posts as $post) { ?>
        <tr>
            <td><?= $post['id'] ?></td>
            <td><?php echo $post['titel'] ?></td>
            <td><?php echo $post['inhoud'] ?></td>
        </tr>
    <?php } ?>
</tbody>
</table>