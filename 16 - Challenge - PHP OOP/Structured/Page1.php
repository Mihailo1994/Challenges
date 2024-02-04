<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <title>Page 1</title>
    <style>
        .banner {
            background-image: url('img1.jpg');
            background-size: cover;
            background-repeat: no-repeat;
        }

        .text-shadow {
            text-shadow: 0px 0px 10px black;
        }
    </style>
</head>
<body>
    <div class="container-fluid banner text-white d-flex align-items-center justify-content-center min-vh-100">
        <div class="text-center">
            <h1 class="mb-3 text-shadow">Create your very own web page</h1>
            <h2 class="mb-4 text-shadow">All you need to do is fill up a form!</h2>
            <a href="Page2.php" class="btn text-white border-white px-4 text-shadow">Start</a>
        </div>
    </div>
</body>
</html>