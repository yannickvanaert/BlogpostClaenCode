<?php
session_start();

if($_SERVER['SERVER_REQUEST'] === 'POST')
{
    if(empty($_POST['titel']) || empty($_POST['inhoud']))
    {
        $_SESSION['msg'] = "All fields are required please fill them in.";
        header('Location: ../pages/add_post.php');
        die;
    }

    if(!empty($_POST['titel']) && !empty($_POST['inhoud']))
    {
        if(Posts::add($_POST['titel'], $_POST['inhoud']))
        {
            $_SESSION['msg'] = 'artikel toegevoegd.';
            header('Location: ../pages/add_post.php');
            die;
        }
    }
    
    include('../includes/db.php');
}
