<?php

session_start();
 
if($_SERVER['REQUEST_METHOD'] === 'POST')
{
    if(empty($_POST['email']) || empty($_POST['password']) || empty($_POST['password-repeat']))
    {
        $_SESSION['msg'] = 'All fields are required. Please fill them in.';
        header('Location: ../pages/registration.php');
        die;
    }

    if($_POST['password'] !== $_POST['password-repeat'])
    {
        $_SESSION['msg'] = 'Passwords do not match. Please try again';
        header('Location: ../pages/registration.php');
        die;
    }
    include('../includes/db.php');
    include('../helpers/userexists.php');

    if($user)
    {
        $_SESSION['msg'] = 'User already exists do you want to login?';
        header('Location: ../pages/login.php');
        die;
    }

    $hash = password_hash($_POST['password'], PASSWORD_BCRYPT);

    $insertUserStatement = $connection->prepare('INSERT INTO users (email, hash) VALUES(:email, :hash)');
    $insertUserStatement->bindParam('email', $_POST['email']);
    $insertUserStatement->bindParam('hash', $hash);
    $insertUserStatement->execute();

    header('Location: ../pages/login.php');
    $_SESSION['msg'] = 'You have succesfully created an account. Please log in.';
    die;
}