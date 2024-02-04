<?php

include_once('functions.php');

checkRequest();

$username = $_POST['username'];
$password = $_POST['password'];
$email = $_POST['email'];


emptyFields($username, 'register-page.php');
emptyFields($password, 'register-page.php');
emptyFields($email, 'register-page.php');
checkEmail($email);
emailLength($email);
checkUsername($username);
validateUsername($username);
passwordStrength($password);

$password = password_hash($password, PASSWORD_DEFAULT);

$combination = $email.','.$username.'='.$password;

file_put_contents('users.txt', $combination . PHP_EOL, FILE_APPEND);

session_start();

$_SESSION['user'] = $username;

header('Location:user.php');




?>