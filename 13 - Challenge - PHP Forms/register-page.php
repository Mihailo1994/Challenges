
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <title>Sign up</title>
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
    <div class="container-fluid banner py-5">
        <div class="row justify-content-center pt-5">
            <h1 class="text-center text-white mb-5">Sign up form</h1>
            <div class="col-12 col-md-3">
                <form action="register.php" method="POST"> 
                    <label for="email" class="form-label text-white fs-5">Enter your Email:</label>
                    <input type="email" name="email" class="form-control mb-4" id="email">
                    <label for="username" class="form-label text-white fs-5">Enter your username:</label>
                    <input type="text" name="username" class="form-control mb-4" id="username">
                    <label for="password" class="form-label text-white fs-5">Enter your password:</label>
                    <input type="password" name="password" class="form-control mb-5" id="password">
                    <input type="submit" class="btn btn-info form-control">
                </form>
                <?php if (isset($_GET['errorEmail'])) { ?>
                    <div class="text-warning mt-5 rounded fw-bold fs-5"><?php echo $_GET['errorEmail']; ?></div>
                <?php } ?>
                <?php if (isset($_GET['error'])) { ?>
                    <div class="bg-danger p-3 mt-5 rounded text-white"><?php echo $_GET['error']; ?></div>
                <?php } ?>
            </div>
        </div>
    </div>
</body>
</html>