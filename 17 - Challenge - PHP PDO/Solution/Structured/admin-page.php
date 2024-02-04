<?php

session_start();

if (!isset($_SESSION['username'])) {
    header("Location:index.php");
    die();
}

require_once ('db.php');

$sqlSelectVehicleModels = $connection->prepare("SELECT * FROM vehicle_models");
$sqlSelectVehicleModels->execute();
$vehicleModels = $sqlSelectVehicleModels->fetchAll();

$sqlSelectVehicleTypes = $connection->prepare("SELECT * FROM vehicle_types");
$sqlSelectVehicleTypes->execute();
$vehicleTypes = $sqlSelectVehicleTypes->fetchAll();

$sqlSelectFuelType = $connection->prepare("SELECT * FROM fuel_type");
$sqlSelectFuelType->execute();
$fuelType = $sqlSelectFuelType->fetchAll();

$sqlSelectVehicles = $connection->prepare("SELECT vehicles.id, vehicle_models.vehicle_model, vehicle_types.vehicle_type, vehicle_chassis_number, vehicle_production_year, registration_number, fuel_type.fuel_type, registration_to  FROM vehicles 
JOIN vehicle_types ON vehicle_types.id = vehicles.vehicle_type 
JOIN vehicle_models ON vehicle_models.id = vehicles.vehicle_model 
JOIN fuel_type ON fuel_type.id = vehicles.fuel_type ORDER BY vehicles.id");
$sqlSelectVehicles->execute();
$vehicles = $sqlSelectVehicles->fetchAll();

if (isset($_GET['search'])) {
    $sqlSelectSearch = $connection->prepare("SELECT vehicles.id, vehicles.vehicle_model, vehicle_models.vehicle_model, vehicle_types.vehicle_type, vehicle_chassis_number, vehicle_production_year, registration_number, fuel_type.fuel_type, registration_to FROM vehicles JOIN vehicle_types ON vehicle_types.id = vehicles.vehicle_type JOIN vehicle_models ON vehicle_models.id = vehicles.vehicle_model JOIN fuel_type ON fuel_type.id = vehicles.fuel_type WHERE vehicle_models.vehicle_model LIKE :search OR vehicles.registration_number LIKE :search OR vehicles.vehicle_chassis_number LIKE :search");
    $search = "%{$_GET['search']}%";
    $sqlSelectSearch->bindParam("search", $search);
    $sqlSelectSearch->execute();
    $vehicles = $sqlSelectSearch->fetchAll();
    }

if ($_POST) {
    $sqlEditSearch = $connection->prepare("SELECT * FROM vehicles JOIN vehicle_types ON vehicle_types.id = vehicles.vehicle_type JOIN vehicle_models ON vehicle_models.id = vehicles.vehicle_model JOIN fuel_type ON fuel_type.id = vehicles.fuel_type WHERE vehicles.id = {$_POST['id']}");
    $sqlEditSearch->execute();
    $vehicleEdit = $sqlEditSearch->fetch();
}   


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <nav class="p-3 d-flex align-items-center justify-content-between" >
        <p class="mb-0 h5">Vehicle Registrion</p>
        <a href="logout.php" class="btn text-primary">Logout</a>
    </nav>
    <div class="container-fluid mb-5">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8 p-5">
                <h1 class="text-center mb-5">Vehicle Registration</h1>
                <?php if(isset($_GET['Err'])) { ?>
                    <p class="text-danger h5 text-center mb-3"><?= $_GET['Err']; ?></p>
                <?php } elseif (isset($_GET['Success'])) {?>
                    <p class="text-success h5 text-center mb-3"><?= $_GET['Success']; ?></p>
                <?php } elseif (isset($_GET['Delete'])) {?>
                    <p class="text-success h5 text-center mb-3"><?= $_GET['Delete']; ?></p>
                <?php } elseif (isset($_GET['Edit'])) {?>
                    <p class="text-success h5 text-center mb-3"><?= $_GET['Edit']; ?></p>
                <?php } ?>
                <form action="insert-vehicle.php" method="POST">
                    <div class="row">
                        <div class="col-6">
                            <div class="mb-3">
                                <label class="form-label">Vehicle Model</label>
                                <select class="form-control" name="vehicleModel">
                                    <option disabled selected>Default select</option>
                                    <?php foreach ($vehicleModels as $value) { ?>
                                            <option value="<?php echo $value['id']; ?>"><?php echo $value['vehicle_model']; ?></option>;
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Vehicle chassis number</label>
                                <input type="text" class="form-control" name="vehicleChassisNumber">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Vehicle registration number</label>
                                <input type="text" class="form-control" placeholder="SK-1234-AB" name="vehicleRegistrationNumber">
                            </div>
                            <div>
                                <label class="form-label">Registration to</label>
                                <input type="date" class="form-control" name="vehicleRegistrationDate">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mb-3">
                                <label class="form-label">Vehicle Type</label>
                                <select class="form-control" name="vehicleType">
                                    <option disabled selected>Default select</option>
                                    <?php foreach ($vehicleTypes as $value) { ?>
                                            <option value="<?php echo $value['id']; ?>"><?php echo $value['vehicle_type']; ?></option>;
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Vehicle production year</label>
                                <input type="number" class="form-control" name="vehicleProductionYear">
                            </div>
                            <div class="mb-5">
                                <label class="form-label">Fuel Type</label>
                                <select class="form-control" name="fuelType">
                                    <option disabled selected>Default select</option>
                                    <?php foreach ($fuelType as $value) { ?>
                                            <option value="<?php echo $value['id']; ?>"><?php echo $value['fuel_type']; ?></option>;
                                    <?php } ?>
                                </select>
                            </div>
                            <div>
                                <button class="form-control btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="container-fluid bg-secondary">
        <form action="admin-page.php" method="GET">
            <div class="p-4 d-flex justify-content-end">
                <div class="w-25">
                    <input type="text" placeholder="Search..." name="search" class="form-control mr-3">
                </div>
                <div class="ms-3">
                    <button type="submit" class="btn btn-primary d-block" id="button-addon2">Search</button>
                </div>
            </div>
        </form>
    </div>
    <div class="container-fluid">
    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Vehicle Model</th>
                <th>Vehicle type</th>
                <th>Vehicle chassis number</th>
                <th>Vehicle production year</th>
                <th>Registration number</th>
                <th>Fuel Type</th>
                <th>Registration to</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                $count = 0;
            ?>
            <?php if($_POST) { ?>
            <form action="edit-vehicle.php" method="POST" class="d-inline">
                <tr>
                    <td></td>
                    <td>
                        <select class="form-control" name="vehicleModel">
                            <option value="<?php echo $vehicleEdit[1]; ?>" selected><?php echo $vehicleEdit['vehicle_model']; ?></option>
                             <?php foreach ($vehicleModels as $value) { ?>
                                <option value="<?php echo $value['id']; ?>"><?php echo $value['vehicle_model']; ?></option>;
                            <?php } ?>
                        </select>
                    </td>
                    <td>
                        <select class="form-control" name="vehicleType">
                        <option value="<?php echo $vehicleEdit[2]; ?>" selected><?php echo $vehicleEdit['vehicle_type']; ?></option>
                            <?php foreach ($vehicleTypes as $value) { ?>
                                <option value="<?php echo $value['id']; ?>"><?php echo $value['vehicle_type']; ?></option>;
                            <?php } ?>
                        </select>
                    </td>
                    <td>
                        <input type="text" class="form-control" name="vehicleChassisNumber" value="<?php echo $vehicleEdit['vehicle_chassis_number']; ?>">
                    </td>
                    <td>
                        <input type="number" class="form-control" name="vehicleProductionYear" value="<?php echo $vehicleEdit['vehicle_production_year']; ?>">
                    </td>
                    <td>
                        <input type="text" class="form-control" name="vehicleRegistrationNumber" value="<?php echo $vehicleEdit['registration_number']; ?>">
                    </td>
                    <td>
                        <select class="form-control" name="fuelType">
                            <option value="<?php echo $vehicleEdit['6']; ?>"><?php echo $vehicleEdit['fuel_type']; ?></option>
                            <?php foreach ($fuelType as $value) { ?>
                                <option value="<?php echo $value['id']; ?>"><?php echo $value['fuel_type']; ?></option>;
                            <?php } ?>
                        </select>
                    </td>
                    <td>
                        <input type="date" class="form-control" name="vehicleRegistrationDate" value="<?php echo $vehicleEdit['registration_to']; ?>">
                    </td>
                    <td>
                        <input type="text" name="id" hidden value="<?= $vehicleEdit['0']; ?>">
                        <button type="submit" class="btn btn-primary">Save</button>  
                    </td>
                </tr>
            </form>
            <?php } else { ?>
            <?php foreach ($vehicles as $vehicle) { ?>
                <?php  
                    $count++;
                    if (strtotime($vehicle['registration_to']) > strtotime('+30 days')) {
                        $rowColor = '';
                        $btnAttribute = 'hidden';
                    } elseif (strtotime($vehicle['registration_to']) < strtotime('+30 days') && strtotime($vehicle['registration_to']) > strtotime('now')) {
                        $rowColor = 'text-warning';
                        $btnAttribute = '';
                    } elseif (strtotime($vehicle['registration_to']) < strtotime('now')) {
                        $rowColor = 'text-danger';
                        $btnAttribute = '';
                    }
                        
                ?>
                <tr class="<?= $rowColor; ?>">
                    <td><?php echo $count; ?></td>
                    <td><?php echo $vehicle['vehicle_model']; ?></td>
                    <td><?php echo $vehicle['vehicle_type']; ?></td>
                    <td><?php echo $vehicle['vehicle_chassis_number']; ?></td>
                    <td><?php echo $vehicle['vehicle_production_year']; ?></td>
                    <td><?php echo $vehicle['registration_number']; ?></td>
                    <td><?php echo $vehicle['fuel_type']; ?></td>
                    <td><?php echo $vehicle['registration_to']; ?></td>
                    <td>
                        <form action="delete-vehicle.php" method="POST" class="d-inline">
                            <input type="text" name="id" hidden value="<?= $vehicle['id']; ?>">
                            <button type="submit" class="btn btn-danger">Delete</button>  
                        </form>
                        <form action="admin-page.php" method="POST" class="d-inline">
                            <input type="text" name="id" hidden value="<?= $vehicle['id']; ?>">
                            <button type="submit" class="btn btn-warning">Edit</button>  
                        </form>
                        <form action="extend.php" method="POST" class="d-inline">
                            <input type="text" name="id" hidden value="<?= $vehicle['id']; ?>">
                            <button type="submit" class="btn btn-success" <?= $btnAttribute; ?>>Extend</button>  
                        </form>   
                    </td>
                </tr>
            <?php } ?>
        <?php } ?>
        </tbody>
    </table>
    </div>
</body>
</html>