<?php

$companyId = $_GET['id'];
$host = 'localhost';
$dbName = 'company';
$user = 'root';
$password = '';

$connection = new PDO("mysql:host=$host;dbname=$dbName", $user, $password);

$querry = "SELECT * FROM `company` WHERE id = {$companyId}";

$sql = $connection->prepare($querry);
$sql->execute();

$data = $sql->fetchAll(PDO::FETCH_ASSOC);



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <title>Page 3</title>
    <style>
        .banner {
            background-image: url('<?php echo $data[0]['cover_image_url']?>');
            background-size: cover;
            background-repeat: no-repeat;
            min-height: 75vh;
        }

        h1 {
            margin-bottom: 14rem;
        }

        .card img {
            height: 320px;
        }


        @media (min-width: 992px) {
            .container-fluid {
                padding-left: 5rem!important;
                padding-right: 5rem!important;
            }
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light px-4">
        <a class="navbar-brand" href="#">Webster</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#home">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#aboutUs">About us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#ocupation"><?php echo $data[0]['business']; ?></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#contact">Contact</a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="banner text-white p-5" id="home">
        <div class="w-50 m-auto text-center h-75">
            <h1><?php echo $data[0]['title'] ?></h1>
            <p class="h3"><?php echo $data[0]['subtitle'] ?></p>
        </div>
    </div>
    <div id="aboutUs" class="container-fluid py-5">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-6 text-center">
                <p>About Us</p>
                <p class="border-bottom pb-4 mb-0"><?php echo $data[0]['about_you'] ?></p>
                <p class="pt-4 mb-1">Tel: <?php echo $data[0]['telephone_number'] ?></p>
                <p>Location: <?php echo $data[0]['company_location'] ?></p>
            </div>
        </div>
    </div>
    <div id="ocupation" class="container-fluid  pt-5">
        <div class="row justify-content-center border-bottom py-5">
            <p class="h4">Services</p>
            <div class="col-12 col-md-4 mb-4 mb-md-0">
                <div class="card text-white bg-dark">
                    <img src="<?php echo $data[0]['image_one_url'] ?>" class="card-img-top" alt="imgOne">
                    <div class="card-body">
                        <h6 class="card-title">Service One Description</h6>
                        <p class="card-text"><?php echo $data[0]['description_one'] ?></p>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-4 mb-4 mb-md-0">
                <div class="card text-white bg-dark">
                    <img src="<?php echo $data[0]['image_two_url'] ?>" class="card-img-top" alt="imgOne">
                    <div class="card-body">
                        <h6 class="card-title">Service Two Description</h6>
                        <p class="card-text"><?php echo $data[0]['description_two'] ?></p>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-4">
                <div class="card text-white bg-dark">
                    <img src="<?php echo $data[0]['image_three_url'] ?>" class="card-img-top" alt="imgOne">
                    <div class="card-body">
                        <h6 class="card-title">Service Three Description</h6>
                        <p class="card-text"><?php echo $data[0]['description_three'] ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="contact" class="container-fluid  py-5">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-6">
                <p class="h6">Contact</p>
                <p><?php echo $data[0]['company_description'] ?></p>
            </div>
            <div class="col-12 col-lg-6">
                <form>
                    <div class="mb-3">
                        <label class="form-label">Name</label>
                        <input type="text" class="form-control" placeholder="Enter your name">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" class="form-control" placeholder="Enter your Email">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Message</label>
                        <textarea class="form-control" rows="5" placeholder="Enter your message"></textarea>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary submit-btn">Send</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="bg-dark  py-3 text-center">
        <p class="text-white">Copyright @ Brainster</p>
        <div>
            <a href="<?php echo $data[0]['linkedin'] ?>" class="text-decoration-none">Linkedin</a>
            <a href="<?php echo $data[0]['facebook'] ?>" class="text-decoration-none">Facebook</a>
            <a href="<?php echo $data[0]['twitter'] ?>" class="text-decoration-none">Twitter</a>
            <a href="<?php echo $data[0]['google'] ?>" class="text-decoration-none">Google+</a>
        </div>
    </div>
</body>
</html>
