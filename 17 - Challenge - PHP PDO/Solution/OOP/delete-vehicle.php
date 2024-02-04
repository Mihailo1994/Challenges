<?php

require_once('./Functions/functions.php');
require_once('./Classes/Vehicle.php');

serverRequest("admin-page.php");

$id = $_POST['id'];

$newVehicle = new Vehicle();
$newVehicle->deleteVehicle($id);




?>