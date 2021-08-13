<?php

    $selectUserStatement = $connection->prepare('SELECT * FROM users WHERE email = :email');
    $selectUserStatement->bindParam('email', $_POST['email']);
    $selectUserStatement->setFetchMode(PDO::FETCH_ASSOC);
    $selectUserStatement->execute();

    $user = $selectUserStatement->fetch();

