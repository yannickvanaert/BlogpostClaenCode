<?php 
include('includes/db.php');
include('templates/header.php');
include('classes/posts.php');

session_start();

?>

<h1>KdG Blog</h1>
<?php if(!isset($_COOKIE['auth'])): ?>
<form action="pages/login.php">
    <button>Login</button>
</form>
<?php endif; ?>

<?php if(isset($_COOKIE['auth'])): ?>
<form action="pages/add_post.php">
    <button type="sumbit">Add post</button>
</form>
<?php endif; ?>

<?php

$posts = Posts::get();
include('templates/list_posts.php');

include('templates/footer.php');
?>