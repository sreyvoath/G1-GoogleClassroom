<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Classroom</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body style="background-color: gray;">

    <div class="container" style="margin-top: 13%;">
        <div class="row">
            <div class="col-4"></div>
            <div class="col-4 border shadow bg-white">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Reset new password</h5>
                    <a href="/views/signin/code_verify.view.php" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></a>
                </div>
                <form action="../../controllers/reset_password/update_password.controller.php" method="post" enctype="multipart/form-data g-3">
                    <div class="modal-body">
                        <input type="email" name="email_verify" id="email" placeholder="Your email" style="width: 90%; height: 40px;border-color: gray; border-radius: 5px;">
                    </div>
                    <div class="modal-body">
                        <input type="password" name="pwd_verify" id="pwe" placeholder="New password" style="width: 90%; height: 40px;border-color: gray; border-radius: 5px;">
                    </div>
                    <span class="text-danger"><?= isset($_SESSION['err_not_found']) ? $_SESSION['err_not_found'] : "" ?></span>
                    <div class="modal-footer" style="border-top: none;">
                        <button type="submit" name="send" class="btn btn-primary">Reset new password</button>
                    </div>
                </form>
            </div>
            <div class="col-4"></div>
        </div>
    </div>
</body>
</html>