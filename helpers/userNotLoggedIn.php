<?php

if(!isset($_COOKIE['auth']))
{
    $_SESSION['msg'] = "You are not logged in. Please do this first";
    header('Location: ../pages/login.php');
}