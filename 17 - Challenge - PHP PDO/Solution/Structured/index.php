<?php

if($_POST) {

    $registrationNumber = strtoupper($_POST['registrationNumber']);

    require_once ('db.php');

    $sqlSelect = $connection->prepare("SELECT vehicle_models.vehicle_model, vehicle_types.vehicle_type, vehicle_chassis_number, vehicle_production_year, registration_number, fuel_type.fuel_type, registration_to  FROM vehicles 
    join vehicle_types on vehicle_types.id = vehicles.vehicle_type 
    join vehicle_models on vehicle_models.id = vehicles.vehicle_model 
    join fuel_type on fuel_type.id = vehicles.fuel_type
    where registration_number = :registrationNumber");
    $sqlSelect->bindParam("registrationNumber", $registrationNumber);
    $sqlSelect->execute();
    if ($sqlSelect->rowCount() == 0) {
        $error = 'The licese plate does not exist';
    } else {
        $vehicle = $sqlSelect->fetch();
    }
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
        <a href="login-page.php" class="btn text-primary">Login</a>
    </nav>
    <div class="container-fluid mb-5">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8 bg-secondary text-center p-5">
                <h1>Vehicle Registration</h1>
                <p>Enter your resitration number to check its validity</p>
                <form action="index.php" method="POST">
                    <input type="text" placeholder="Registration number ex: SK-1234-AB" name="registrationNumber" class="form-control w-50 m-auto mb-3" required>
                    <button type="submit" class="btn btn-primary">Search</button>
                </form>
            </div>
        </div>
    </div>
    <?php if (isset($error)) { ?>
        <p class="h4 text-center mt-5"><?php echo $error; ?></p>
    <?php  } ?>
    <?php if (isset($vehicle)) { ?>
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col">
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
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td><?php echo $vehicle['vehicle_model']; ?></td>
                                <td><?php echo $vehicle['vehicle_type']; ?></td>
                                <td><?php echo $vehicle['vehicle_chassis_number']; ?></td>
                                <td><?php echo $vehicle['vehicle_production_year']; ?></td>
                                <td><?php echo $vehicle['registration_number']; ?></td>
                                <td><?php echo $vehicle['fuel_type']; ?></td>
                                <td><?php echo $vehicle['registration_to']; ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>  
    <?php } ?>
</body>
</html>