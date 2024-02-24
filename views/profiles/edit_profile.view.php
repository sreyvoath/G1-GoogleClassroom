<?php
session_start();
$user = $_SESSION['user'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Classroom</title>

    <!-- Meta Tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="Webestica.com">
    <meta name="description" content="Eduport- LMS, Education and Course Theme">


    <!-- Favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <!-- link boostrap5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;700&family=Roboto:wght@400;500;700&display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="css/main.css">

    <!-- Plugins CSS -->
    <link rel="stylesheet" type="text/css" href="vendor/font-awesome/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="vendor/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" type="text/css" href="vendor/tiny-slider/tiny-slider.css">
    <link rel="stylesheet" type="text/css" href="vendor/glightbox/css/glightbox.css">

    <!-- Theme CSS -->
    <link id="style-switch" rel="stylesheet" type="text/css" href="vendor/css/style.css">
    <link id="style-switch" rel="stylesheet" type="text/css" href="vendor/css/create.css">
    <link id="style-switch" rel="stylesheet" type="text/css" href="vendor/css/trainer.css">



    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-7N7LGGGWT1');
    </script>

</head>

<body>
    <div class="container mt-n4">
        <div class="row">
            <div class="col-3"></div>
            <div class="col-6">
                <div class="shadow-lg bg-body rounded border-l mx-auto d-block mt-3">
                    <img src="../../assets/images/about/24.jpg" class="img-fluid" alt="cover">
                    <div class="avatar avatar-xxl mt-n3 d-flex justify-content-center align-items-center">
                        <img class="avatar-xxl rounded-circle border border-white border-3 shadow" style="width: 150px; height:150px; object-fit:cover; border-radius: 50%; margin-top: -60px " src="../../assets/images/profiles/<?= $_SESSION['user']['image'] ?>" alt="avatar">
                    </div>
                    <div class="card-body d-flex justify-content-center pb-5 pt-3">
                        <form class="card-body" action="../../controllers/profiles/update_profile.controller.php" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="id" id="id" value="<?= isset($user['id']) ? $user['id'] : 1 ?>">
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Name*</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="name" placeholder="User Name" value="<?= $user['name'] ?>">
                                <span class="text-danger"><?= isset($_SESSION['profile_err']) ? $_SESSION['profile_err'] : "" ?></span>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Email*</label>
                                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email" placeholder="Email" value="<?= $user['email'] ?>">
                                <span class="text-danger"><?= isset($_SESSION['profile_err']) ? $_SESSION['profile_err'] : "" ?></span>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Image*</label>
                                <input type="file" class="form-control" id="exampleInputPassword1" name="image">
                                <span class="text-danger"><?= isset($_SESSION['profile_err']) ? $_SESSION['profile_err'] : "" ?></span>
                            </div>
                            <a href="/home" class="btn btn-outline-danger me-3">Cancel</a>
                            <button type="submit" class="btn btn-outline-warning">Change</button>
                        </form>
                    </div>
                    <div id="previewContainer"></div>
                </div>
            </div>
            <div class="col-3"></div>
        </div>
    </div>
    <?php unset($_SESSION['profile_err']) ?>