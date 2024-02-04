<?php 

session_start();

$user = $_SESSION['user'] ?? '';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <title>Front page</title>
    <style>
        .banner {
            background-image: url('img.jpg');
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            min-height: 100vh;
        }
    </style>
</head>
<body>
    <div class="banner d-flex justify-content-center align-items-center">
        <div class="text-white">
            <?php if($user !== '') { ?>
                <h1>Welcome <?php echo $user; ?> </h1>
            <?php } ?>
        </div>
    </div>
</body>
</html>