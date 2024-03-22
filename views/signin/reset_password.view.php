<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email Verification</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<?php
session_start();
?>
<body style="background-color: gray;">

    <div class="container" style="margin-top: 13%;">
        <div class="row">
            <div class="col-4"></div>
            <div class="col-4 border shadow bg-white">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Verify with your email</h5>
                    <a href="/user-signin" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></a>
                </div>
                <form id="emailForm" action="../../controllers/reset_password/reset_password.controller.php" method="post" enctype="multipart/form-data g-3">
                    <div class="modal-body">
                        <input type="email" name="email" id="email" placeholder="Your email" style="width: 90%; height: 40px;border-color: gray; border-radius: 5px;">
                    </div>
                    <span style="margin-top: -30px;" class="text-danger mx-3"><?= isset($_SESSION['err_not_found']) ? $_SESSION['err_not_found'] : "" ?></span>
                    <div class="modal-footer" style="border-top: none;">
                        <button type="submit" name="send" onclick="submitForm()" class="btn btn-primary">Next</button>
                    </div>
                </form>
            </div>
            <div class="col-4"></div>
        </div>
    </div>
    <?php unset($_SESSION['err_not_found']);?>
</body>

</html>