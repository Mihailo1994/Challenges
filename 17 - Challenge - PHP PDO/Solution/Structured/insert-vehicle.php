<?php

if($_SERVER['REQUEST_METHOD'] != "POST") {
    header("Location:admin-page.php");
    die();
}

require_once ('db.php');


$data = [
    'vehicle_model' => $_POST['vehicleModel'],
    'vehicle_type' => $_POST['vehicleType'],
    'vehicle_chassis_number' => $_POST['vehicleChassisNumber'],
    'vehicle_production_year' => $_POST['vehicleProductionYear'],
    'registration_number' => $_POST['vehicleRegistrationNumber'],
    'fuel_type' => $_POST['fuelType'],
    'registration_to' => $_POST['vehicleRegistrationDate'],
];

$sqlSelect = $connection->prepare("SELECT * FROM vehicles where vehicle_chassis_number = '{$_POST['vehicleChassisNumber']}'");
$sqlSelect->execute();
if ($sqlSelect->rowCount() == 0) {
    $sqlInsert = $connection->prepare("INSERT INTO vehicles (vehicle_model, vehicle_type, vehicle_chassis_number, vehicle_production_year, registration_number, fuel_type, registration_to) VALUES (:vehicle_model, :vehicle_type, :vehicle_chassis_number, :vehicle_production_year, :registration_number, :fuel_type, :registration_to)");
    $sqlInsert->execute($data);
    header("Location:admin-page.php?Success=Vehicle successfully entered!");
} else {
    header("Location:admin-page.php?Err=Vehicle with this chassis number already exists!");
    die();
}





?>