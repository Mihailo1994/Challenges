<?php

require_once ('db.php');

$username = 'admin';
$password = 'password';

$password_hash = password_hash($password, PASSWORD_DEFAULT);

$sqlSelect = $connection->prepare("SELECT * FROM `users` WHERE username = :username");
$sqlSelect->bindParam("username", $username);
$sqlSelect->execute();


if ($sqlSelect->rowCount() == 0) {
    $sqlInsert = $connection->prepare("INSERT INTO users (username, password) VALUES (:username, :password)");
    $sqlInsert->bindParam("username", $username);
    $sqlInsert->bindParam("password", $password_hash);
    $sqlInsert->execute();
}


?>