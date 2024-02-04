<?php

class Connection {

    private $connection;
    private $host = 'localhost';
    private $dbName = 'company';
    private $user = 'root';
    private $password = '';

    public function __construct() {
        try {
            $this->connection = new PDO("mysql:host=$this->host;dbname=$this->dbName", $this->user, $this->password);
        } catch (PDOExeption $e) {
            echo "Database connection problem";
            die();
        }
    }

    public function destroy() {
        $this->connection = null;
    }

    public function getConnection() {
        return $this->connection;
    }


}

?>