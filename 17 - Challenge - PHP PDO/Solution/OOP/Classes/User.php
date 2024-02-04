<?php

require_once('Connection.php');


class User {

    private $username;
    private $password;

    public function __construct($username, $password) {
        $this->username = $username;
        $this->password = $password;
    }

    public function login() {
        
        session_start();

        $username = $this->username;
        $password = $this->password;

        $connectionObj = new Connection();
        $connection = $connectionObj->getConnection();

        $sqlSelect = $connection->prepare("SELECT * FROM users WHERE username = :username");
        $sqlSelect->bindParam("username", $username);
        $sqlSelect->execute();

        if ($sqlSelect->rowCount() == 1) {
            $admin = $sqlSelect->fetch();
            $connectionObj->destroy();
            if (password_verify($password, $admin['password'])) {
                $_SESSION['username'] = $admin['username'];
                header("Location: admin-page.php");
            } else {
                header("Location:login-page.php?Err=Wrong username or password");        
            }
        } else {
            $connectionObj->destroy();
            header("Location:login-page.php?Err=Wrong username or password");        
        } 
    }
}

?>