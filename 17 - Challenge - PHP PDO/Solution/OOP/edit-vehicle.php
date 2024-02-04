<?php 

require_once('./Functions/functions.php');
require_once('./Classes/Vehicle.php');

serverRequest("admin-page.php");

$newVehicle = new Vehicle();

$id = $_POST['id'];


$newVehicle->editVehicle($id);




?>