<?php
    $server = 'localhost';
    $user = 'homestead';
    $pwd = 'secret';
    $dbname = 'homestead';
    $dsn = "pgsql:dbname = $dbname; host = $server";
    $pdo = new PDO($dsn, $user, $pwd);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>