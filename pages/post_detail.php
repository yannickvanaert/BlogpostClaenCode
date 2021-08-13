<?php

include('../templates/header.php');
include('../includes/db.php');

?>


<br>
<h1><?= $post['titel']." (id:".$post['id'].")" ?></h1>
<br>
<p><?= $post['inhoud'] ?></p>

<?php if($post['user_id'] === $user['id']): ?>
<form method="POST" action="../pages/edit_post.php?id=<?php echo $id ?>">
   <button type="submit">Edit post</button>
</form>
<br>
<form action="../includes/delete_action.php" method="post">
    <button type="submit">Delete</button>
</form>
<?php endif; ?>


