<?php

require_once('./Functions/functions.php');
require_once('./Classes/Vehicle.php');

serverRequest("admin-page.php");


$newVehicle = new Vehicle;

$newVehicle->setModel($_POST['vehicleModel']);
$newVehicle->setType($_POST['vehicleType']);
$newVehicle->setChassisNumber($_POST['vehicleChassisNumber']);
$newVehicle->setProductionYear($_POST['vehicleProductionYear']);
$newVehicle->setRegistrationNumber($_POST['vehicleRegistrationNumber']);
$newVehicle->setRegistrationDate($_POST['vehicleRegistrationDate']);
$newVehicle->setFuelType($_POST['fuelType']);

$newVehicle->insertVehicle();


header("Location:admin-page.php");



?>