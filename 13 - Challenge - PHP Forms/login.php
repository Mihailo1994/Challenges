<?php 

include_once('functions.php');

checkRequest();

$username = $_POST['username'];
$password = $_POST['password'];

emptyFields($username, 'login-page.php');
emptyFields($password, 'login-page.php');

$data = file_get_contents('users.txt');

$users = explode(PHP_EOL, $data); 

foreach ($users as $user) {
    $userdata = explode(',', $user);
    $userinfo = explode('=', $userdata[1]);

    if ($username == $userinfo[0] && password_verify($password, $userinfo[1])) {
        session_start();
        $_SESSION['user'] = $username;
        header("Location:user.php");
        die();
    } 
}

header("Location:login-page.php?error=Wrong username/password combination");


?>