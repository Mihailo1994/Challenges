<?php

class Connection {

    private $connection;
    private $host = 'localhost';
    private $dbName = 'vehicle_registration_database';
    private $user = 'root';
    private $password = '';

    public function __construct() {
        try {
            $this->connection = new PDO("mysql:host=$this->host;dbname=$this->dbName", $this->user, $this->password);
        } catch (PDOException $e) {
            echo "Database down";
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