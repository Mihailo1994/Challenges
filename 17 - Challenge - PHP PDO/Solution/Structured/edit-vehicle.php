<?php 


if($_SERVER['REQUEST_METHOD'] != "POST") {
    header("Location:login-page.php");
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


$sqlEdit = $connection->prepare("UPDATE vehicles SET vehicle_model = :vehicle_model, vehicle_type = :vehicle_type, vehicle_chassis_number = :vehicle_chassis_number, vehicle_production_year = :vehicle_production_year, registration_number = :registration_number, fuel_type = :fuel_type, registration_to = :registration_to WHERE vehicles.id = {$_POST['id']}");
$sqlEdit->execute($data);


header("Location:admin-page.php?Edit=Successfully edited");



?>