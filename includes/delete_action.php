<?php
include('../classes/posts.php');

if($_SERVER['REQUEST_METHOD'] === 'POST')
{
    Posts::delete($_GET['id']);
    $_SESSION['msg'] = 'artikel is verwijderd.';
    header('Location: ../index.php');
    die;
}