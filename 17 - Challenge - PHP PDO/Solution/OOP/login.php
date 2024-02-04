<?php 

require_once('./Functions/functions.php');
require_once('./Classes/User.php');
require_once('./Classes/Connection.php');

serverRequest("login-page.php");

$username = $_POST['username'];
$password = $_POST['password'];

$user = new User($username, $password);

$user->login();


?>