<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Classroom</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>

<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-2"></div>
            <div class="col-8 d-flex gap-5 border border-info border-3 p-5 shadow-lg p-3 mb-5 bg-body rounded" style="border-radius: 40px;">
                <div class="image p-1">
                    <h3 class="bg-info p-2 text-white text-center" style="border-radius: 10px; margin-top:-53px; margin-left:-53px;">Update Class</h3>
                    <img class="border border-info border-3 mt-3 " src="../../assets/images/classes/<?= $class['image'] ?>" alt="" style="width:270px; height:300px; border-radius: 20px; margin-left:-25px;">
                </div>
                <form method="POST" action="../../controllers/classes/class.update.controller.php" enctype="multipart/form-data" class="" style="width:100%; height:auto; object-fit: cover;">
                    <input type="hidden" id="id" name="id" value="<?= $class['id'] ?>">
                    <div class="mb-3">
                        <label for="classname" class="form-label">Class Name*</label>
                        <input type="text" class="form-control" name="classname" id="classname" required placeholder="Enter a Name" value="<?= $class['title'] ?>">
                    </div>
                    <div class="mb-3">
                        <label for="section" class="form-label">Section*</label>
                        <input type="text" class="form-control" name="section" id="section" required placeholder="Enter a section" value="<?= $class['section'] ?>">
                    </div>
                    <div class="mb-3">
                        <label for="subject" class="form-label">Subject*</label>
                        <input type="text" class="form-control" name="subject" id="subject" required placeholder="Enter a subject" value="<?= $class['subject'] ?>">
                    </div>
                    <!-- image -->
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Image*</label>
                        <input type="file" class="form-control" id="exampleInputPassword1" name="image">
                        <span class="text-danger"><?= isset($_SESSION['image']) ? $_SESSION['image'] : "" ?></span>
                    </div>
                    <!-- Button -->
                    <div class="align-items-center mt-0">
                        <div class="d-grid d-flex justify-content-end ">
                            <a href="/home" class="me-3 btn border-secondary btn-outline-danger mb-0" type="button">Cancel</a>
                            <button type="submit" class="btn btn-primary mb-0" type="button">Update</button>
                        </div>
                    </div>
                </form>

            </div>
            <div class="col-2"></div>
        </div>
    </div>

</body>

</html>