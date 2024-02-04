<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="container-fluid mb-5">
        <div class="row justify-content-center">
            <div class="col-12 col-md-6 p-5">
                <p class="mb-0 h3 text-center mb-5">Login</p>
                <form action="login.php" method="POST">
                    <label class="form-label">Enter your username:</label>
                    <input type="text" name="username" class="form-control mb-3" required>
                    <label class="form-label">Enter your password:</label>
                    <input type="password" name="password" class="form-control mb-3" required>
                    <button type="submit" class="btn btn-primary">Login</button>
                </form>
                <?php if (isset($_GET['Err'])) { ?>
                    <p class="text-danger h-3 text-center mt-3"><?php echo $_GET['Err']; ?></p>
                <?php } ?>
            </div>
        </div>
    </div>