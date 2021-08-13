<?php

session_start();

if($_SERVER['REQUEST_METHOD'] === 'POST')
{
    if(empty($_POST['email']) || empty($_POST['password']))
    {
        $_SESSION['msg'] = 'All fields are required. Please fill them in.';
        $email = $_POST['email'];
        header('Location: ../pages/login.php');
        die;
    }

    include('../includes/db.php');

    include('../helpers/userexists.php');

    if(!$user)
    {
        $_SESSION['msg'] = 'These credentials do not match our records';
        header('Location: ../pages/login.php');
        die;
    }

    if(!password_verify($_POST['password'], $user['hash']))
    {
        $_SESSION['msg'] = 'These credentials do not match our records.';
        header('Location: ../pages/login.php');
        die;
    }

    $userSessionId = uniqid();

    $updateUserSessionIdStatement = $connection->prepare('UPDATE users SET session_id = :sessionId WHERE email = :email');
    $updateUserSessionIdStatement->bindParam('sessionId', $userSessionId);
    $updateUserSessionIdStatement->bindParam('email', $_POST['email']);
    $updateUserSessionIdStatement->execute();

    setcookie('auth', $userSessionId, time() + 3600, '/');

    header('Location: ../index.php');
    die;

}