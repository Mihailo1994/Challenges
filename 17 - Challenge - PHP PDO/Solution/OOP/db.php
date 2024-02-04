<?php

try {
    $connection = new PDO("mysql:host=localhost;dbname=vehicle_registration_database", "root", '');
} catch (PDOException $e) {
    echo "Database down";
    die();
}

?>