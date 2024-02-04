<?php

function checkRequest() {
    if($_SERVER['REQUEST_METHOD'] != "POST") {
        header("Location:index.php");
    } 
}

function checkEmail($email) {

    $data = file_get_contents('users.txt');
    $users = explode(PHP_EOL, $data);
    
    foreach ($users as $user) {
        $userdata = explode(',', $user);

        if ($email === $userdata[0]) {
            header("Location:register-page.php?errorEmail=A user with this email already exists");
            die();
        }
    }
}

function checkUsername($username) {
    $data = file_get_contents('users.txt');
    $users = explode(PHP_EOL, $data);
    
    foreach ($users as $user) {
        $userdata = explode(',', $user);
        $userinfo = explode('=', $userdata[1]);

        if ($username === $userinfo[0]) {
            header("Location:register-page.php?error=Username taken.");
            die();
        }
    }
}

function emptyFields($input, $link) {
    if (empty($input)) {
        header("Location:$link?error=All inputs are required!");
        die();
    }
}


function validateUsername($username) {
    if (preg_match('/[#$%^&*()+=\-\[\]\';,.\/{}|":<>?~\\\\]/', $username) || preg_match('/\s/', $username)) {
        header("Location:register-page.php?error=Username cannot contain empty spaces or special signs");
        die();
    }
}

function emailLength($email) {
    $useremail = explode('@', $email);
    if (strlen($useremail[0]) < 5) {
        header("Location:register-page.php?error=Email must have at least 5 characters before @");
        die();
    }    
}

function passwordStrength($password) {
    if(!preg_match('/[a-z]+/', $password) || !preg_match('/[A-Z]+/', $password) || !preg_match('/[0-9]+/', $password) || !preg_match('/[#$%^&*()+=\-\[\]\';,.\/{}|":<>?~\\\\]/', $password)){
        header("Location:register-page.php?error=Password must have at least one number, one special sign and one uppercase letter");
        die();
    }
}
?>