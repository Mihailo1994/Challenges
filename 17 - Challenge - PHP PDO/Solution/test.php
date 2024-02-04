<?php

if ($_POST) {
    $date = $_POST['date'];

    var_dump($date);
}

// $now = date('2023-7-22');
// // var_dump($now);
// $newdate = strtotime($now) + strtotime('+365 days');

// var_dump($newdate);
// if(strtotime($now) > strtotime('+20 days')) {
//     echo 'true';
// }
// echo '<br>';

// echo strtotime("now") . '<hr>';
// echo strtotime('-30 days')

// $date=date_create("2013-05-01");
// date_modify($date,"+365 days");
// echo date_format($date,"Y-m-d");




require_once ('db.php');

$sqlSelectVehicle = $connection->prepare("SELECT registration_to FROM vehicles WHERE id = 2");
$sqlSelectVehicle->execute();
$vehicle = $sqlSelectVehicle->fetch();
// echo $vehicle['registration_to'];
$registrationDate = $vehicle['registration_to'];

$futureDate = strtotime("now". " + 1 year");
// $futureDate = date('Y-m-d', strtotime('2023-5-5'));
echo $futureDate . '<br>';
$futuredate = date('Y-m-d', $futureDate);
echo $futuredate . '<br>';




?>
<!-- 


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="POST">

    <input type="date" name="date">
    <button type="submit">Submit</button>
    </form>

    <select>
        <option disabled selected> Select</option>
        <option value="volvo">Volvo</option>
        <option value="saab">Saab</option>
        <option value="opel">Opel</option>
        <option value="audi">Audi</option>
    </select>



</body>
</html> -->




("SELECT vehicles.id, vehicle_models.vehicle_model, vehicle_models.id, vehicle_types.vehicle_type, vehicle_chassis_number, vehicle_production_year, registration_number, fuel_type.fuel_type, registration_to FROM vehicles JOIN vehicle_types ON vehicle_types.id = vehicles.vehicle_type JOIN vehicle_models ON vehicle_models.id = vehicles.vehicle_model JOIN fuel_type ON fuel_type.id = vehicles.fuel_type WHERE vehicles.id = {$_POST['id']}");