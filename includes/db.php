<?php
    try
    {
        $connection = new PDO('mysql:host=localhost;dbname=blog','root','root');
    } 
    catch (Exception $exeption)
    {
        echo $exeption->getMessage();
    }
?>