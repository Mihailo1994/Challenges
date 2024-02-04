<?php 
session_start();

if($_SERVER['REQUEST_METHOD'] != "POST") {
    header("Location:login-page.php");
    die();
}

require_once ('db.php');

$username = $_POST['username'];
$password = $_POST['password'];

$sqlSelect = $connection->prepare("SELECT * FROM users WHERE username = :username");
$sqlSelect->bindParam("username", $username);
$sqlSelect->execute();

if ($sqlSelect->rowCount() == 1) {
    $admin = $sqlSelect->fetch();
    if (password_verify($password, $admin['password'])) {
        $_SESSION['username'] = $admin['username'];
        header("Location: admin-page.php");
    } else {
        header("Location:login-page.php?Err=Wrong username or password");        
    }
} else {
    header("Location:login-page.php?Err=Wrong username or password");        
}

?>