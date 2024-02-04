<?php

session_start();


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <title>Page 2</title>
    <style>
        .bg {
            background-image: url('img1.jpg');
            background-size: cover;
            background-repeat: no-repeat;
        }

        .submit-btn {
            padding: 0.5rem 10rem;
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
    <div class="bg py-5 min-vh-100">
        <p class="text-center text-white mb-4 px-4 px-md-0 h2">You are one step away from your webpage</p>
        <?php if(!empty($_GET['error'])) { ?>
            <p class="text-warning text-center h3 mb-3"><?php echo $_GET['error']; ?></p>
        <?php } ?>
        <form action="create-website.php" method="POST">
            <div class="container-fluid">
                <div class="row justify-content-center mb-4">
                    <div class="col-12 col-md-10 col-lg-4">
                        <div class="bg-white rounded p-4 mb-4">
                            <div class="mb-3">
                                <label class="form-label">Cover image URL</label>
                                <input type="text" class="form-control" name="coverImageUrl" value=<?php echo $_SESSION['coverImageUrl'] ?? ''; ?>>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Main Title of Page</label>
                                <input type="text" class="form-control" name="title" value=<?php echo $_SESSION['title'] ?? ''; ?>>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Subtitle of Page</label>
                                <input type="text" class="form-control" name="subtitle" value=<?php echo $_SESSION['subtitle'] ?? ''; ?>>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Something about you</label>
                                <textarea class="form-control" rows="3" name="aboutYou"><?php echo $_SESSION['aboutYou'] ?? ''; ?></textarea>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Your telephone number</label>
                                <input type="number" class="form-control" name="telephoneNumber" value=<?php echo $_SESSION['telephoneNumber'] ?? ''; ?>>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Location</label>
                                <input type="text" class="form-control" name="companyLocation" value=<?php echo $_SESSION['companyLocation'] ?? ''; ?>>
                            </div>
                        </div>
                        <div class="bg-white rounded p-4 mb-4 mb-lg-0">
                            <div>
                                <label class="form-label">Do you provide services or products?</label>
                                <select name="business" class="form-control">
                                    <option value="Services">Services</option>
                                    <option value="Products">Products</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-10 col-lg-4">
                        <div class="bg-white rounded p-4 mb-4">
                            <p class="mb-3">Provide url for an image and description of your service/product</p>
                            <div class="mb-3">
                                <label class="form-label">Image URL</label>
                                <input type="text" class="form-control" name="imageOneUrl" value=<?php echo $_SESSION['imageOneUrl'] ?? ''; ?>>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Description of service/product</label>
                                <textarea class="form-control" rows="3" name="descriptionOne"><?php echo $_SESSION['descriptionOne'] ?? ''; ?></textarea>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Image URL</label>
                                <input type="text" class="form-control" name="imageTwoUrl" value=<?php echo $_SESSION['imageTwoUrl'] ?? ''; ?>>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Description of service/product</label>
                                <textarea class="form-control" rows="3" name="descriptionTwo"><?php echo $_SESSION['descriptionTwo'] ?? ''; ?></textarea>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Image URL</label>
                                <input type="text" class="form-control" name="imageThreeUrl" value=<?php echo $_SESSION['imageThreeUrl'] ?? ''; ?>>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Description of service/product</label>
                                <textarea class="form-control" rows="3" name="descriptionThree"><?php echo $_SESSION['descriptionThree'] ?? ''; ?></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-10 col-lg-4">
                        <div class="bg-white rounded p-4 mb-4">
                            <div class="mb-3 border-bottom pb-4">
                                <label class="form-label">Provide a description of your company, something people shoud be aware of before they contact you:</label>
                                <textarea class="form-control" rows="3" name="descriptionCompany"><?php echo $_SESSION['descriptionCompany'] ?? ''; ?></textarea>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Linkedin</label>
                                <input type="text" class="form-control" name="linkedin" value=<?php echo $_SESSION['linkedin'] ?? ''; ?>>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Facebook</label>
                                <input type="text" class="form-control" name="facebook" value=<?php echo $_SESSION['facebook'] ?? ''; ?>>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Twitter</label>
                                <input type="text" class="form-control" name="twitter" value=<?php echo $_SESSION['twitter'] ?? ''; ?>>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Google+</label>
                                <input type="text" class="form-control" name="google" value=<?php echo $_SESSION['google'] ?? ''; ?>>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-secondary submit-btn">Submit</button>
                </div>
            </div>
        </form>
        </div>
    </div>
</body>
</html>

<?php

session_unset();

?>

