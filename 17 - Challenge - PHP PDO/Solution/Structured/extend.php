<?php

if($_SERVER['REQUEST_METHOD'] != "POST") {
    header("Location:login-page.php");
    die();
}

require_once ('db.php');

$sqlSelectVehicle = $connection->prepare("SELECT registration_to FROM vehicles WHERE id = {$_POST['id']}");
$sqlSelectVehicle->execute();
$vehicle = $sqlSelectVehicle->fetch();


if (strtotime($vehicle['registration_to']) > strtotime('now') && strtotime($vehicle['registration_to']) < strtotime('+30 days')) {
    $newRegistrationDate = date('Y-m-d', strtotime($vehicle['registration_to'] . " + 1 year"));
} elseif ((strtotime($vehicle['registration_to']) <= strtotime('now'))) {
    $newRegistrationDate = date('Y-m-d', strtotime("now" . " + 1 year"));
}


$sqlExtend = $connection->prepare("UPDATE vehicles SET registration_to = '{$newRegistrationDate}' WHERE vehicles.id = {$_POST['id']}");
$sqlExtend->execute();

header("Location: admin-page.php");


?>