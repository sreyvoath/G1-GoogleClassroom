<?php
require "database/database.php";
require "models/assignments/assignment.model.php";
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $_SESSION['assign_id'] = $id;
    $assignment = getAssign($id);
}

?>
<main class="d-flex " style="width: 100%;">
    <section class="pt-0" style="width: 70%;">
        <div class="container">
            <table class="table">
                <!-- PHP loop for classes START -->
                <tbody class="tbodySearch" id="tbodySearch">
                    <tr>
                        <!-- Course item -->
                        <td>
                            <div class="d-flex align-items-center justify-content-between">
                                <!-- Content -->
                                <div class="d-flex " >
                                    <!-- Image -->
                                    <div class="w-100px " style="margin-right: -13px;">
                                        <img src="assets/images/about/download (2).png" class="rounded" alt="">
                                    </div>
                                    <div class="mb-0 ms-2 mt-2">
                                        <!-- Title -->
                                        <h3><a href="#"><?= $assignment['title'] ?></a></h3>
                                        <!-- Info -->
                                        <p class="h6 fw-light mb-0 small me-3"><?= $_SESSION['user_created']['name'] ?> | <?= $assignment['start_date'] ?></p>
                                        <br>
                                        <div class="d-flex justify-content-between align-items-center " style="width: 320%;">
                                            <div>
                                                <p class="h6 fw-light mb-0 "><?= $assignment['score'] ?> Points</p>
                                            </div>
                                            <div>
                                                <p style="margin-bottom: -15px;"><?= $assignment['end_date'] ?>, <?= $assignment['end_time'] ?> PM</p>
                                            </div>

                                        </div>

                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>

                </tbody>

                <!-- PHP loop for classes END -->
            </table>
            <div class="mb-0 ms-8" style="margin-left: -20px;">
                <div class="p-5">
                    <span class="d-inline-block" style="height: auto; width: 400px;">
                        <a class="d-flex border" style="border-radius: 10px; margin-left: -40px; margin-top: -30px;" href="assets/images/upload/<?= $assignment['document'] ?>">
                            <div class="bg p-2 border" style="border-radius: 10px 0 0 10px;">
                                <img src="/assets/images/bg/06.png" alt="">
                            </div>
                            <div class="title mx-3" style="margin-top: 30px;">
                                <h5><?= $assignment['title'] ?></h5>
                                <p><?= $assignment['document'] ?></p>
                            </div>
                        </a>
                    </span>
                </div>
            </div>
            <hr>
            <div class="mb-0 ms-8">
                <p><i class="fas fa-user-graduate me-3"></i>Class comments</p>
            </div>

            <div class="ms-7 d-flex flex-row">
                <div class="avatar avatar-xl mt-3 d-flex justify-content-center align-items-center">
                    <img class="avatar-lg rounded-circle border border-white border-1 shadow" src="../../assets/images/profiles/<?= $_SESSION['user']['image'] ?>" alt="avatar">
                </div>

                <div class="border ms-4 rounded" style="width: 1000px; height:120px;">
                    <div class="">
                        <nav class="navbar">
                            <div class="container-fluid ">
                                <dive class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
                                    <input type="text" style="width: 300%;" class="form-control bg-white col-6" name="classname" id="classname" required placeholder="Add class comment">
                                </dive>
                                <button type="submit" class="btn btn-outline-primary mt-1"><i class="bi bi-send-fill"></i></button>
                            </div>
                        </nav>
                        <div class="collapse" id="navbarToggleExternalContent">
                            <div class=" p-3">
                                <i class="fa fa-bold me-3" aria-hidden="true"></i>
                                <i class="fa fa-italic me-3" aria-hidden="true"></i>
                                <i class="fa fa-underline me-3" aria-hidden="true"></i>
                                <i class="fa fa-align-justify me-3" aria-hidden="true"></i>
                                <i class="fa fa-text-width me-3" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>

    <!-- =============================================================================================== -->
    <div class="container mt-5" style="width: 30%; ">
        <div class="p-3 mb-2 rounded shadow-sm p-3 mb-5 bg-body rounded" style="border: 1px solid gainsboro;">
            <div class="card-body d-flex justify-content-between text-center align-items-center ">
                <p class="card-title fs-4">Your work</p>
                <p class="card-text"">Turned in</p>
            </div>
            <div class=" card-body rounded " style=" margin-top: -70px;">
                <div class="p-5">
                    <span class="d-inline-block" style="height: auto; width: 120%;">
                        <a class="d-flex border align_items-center" style="border-radius: 10px; margin-left: -50px;" href="assets/images/upload/<?= $assignment['document'] ?>">
                            <div class="bg p-2 border text-center" style="border-radius: 10px 0 0 10px;">
                                <img src="/assets/images/bg/06.png" alt="" width="50px" height="40px">
                            </div>
                            <div class="title mx-3 mt-2">
                                <p><?= $assignment['document'] ?></p>
                            </div>

                        </a>
                    </span>

                </div>
                <div class="nav-item dropdown" style="margin-top: -20px;">
                    <label for="file-upload" class="btn border-primary" style="width: 100%; cursor: pointer;">
                        <i class="fa fa-plus me-3" aria-hidden="true"></i>
                        <span>Add or create</span>
                        <input id="file-upload" type="file" style="display: none;">
                    </label>
                    <a class="nav-link " href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <button type="button" class="btn btn-primary" style="width: 100%;">Submit</button>
                    </a>
                </div>
            </div>

        </div>

        <div class="p-3 mb-2 rounded shadow-sm p-3 mb-5 bg-body rounded" style="border: 1px solid gainsboro; margin-top: -20px;">
            <div class="mb-0 ms-3 ">
                <p><i class="fas fa-user-graduate me-3"></i>Private comments</p>
                <div class="me-3 ">
                    <nav class="navbar">
                        <div class="container-fluid ">
                            <dive class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
                                <input type="text" style="width: 100%;" class="form-control bg-white col-6" name="classname" id="classname" required placeholder="Add class comment">
                            </dive>
                            <button type="submit" class=" small btn btn-outline-primary"><i class="bi bi-send-fill small"></i></button>
                        </div>
                    </nav>
                    <div class="collapse" id="private">
                        <div class=" p-3">
                            <i class="fa fa-bold me-3" aria-hidden="true"></i>
                            <i class="fa fa-italic me-3" aria-hidden="true"></i>
                            <i class="fa fa-underline me-3" aria-hidden="true"></i>
                            <i class="fa fa-align-justify me-3" aria-hidden="true"></i>
                            <i class="fa fa-text-width me-3" aria-hidden="true"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>