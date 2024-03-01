<?php
require "database/database.php";
require "models/assignments/assignment.model.php";
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $_SESSION['assign_id'] = $id;
    $assignment = getAssign($id);
}

?>
<main>
    <div class="container">
        <div class="row mb-5 align-items-center ">
            <!-- Search bar -->
            <script src="../../js/main.js"></script>
            <ul class="nav nav-pills nav-pills-bg-soft justify-content-sm-center mb-4 px-3" id="course-pills-tab" role="tablist">
                <div class="btn-toolbar align-items-center justify-content-evenly" role="toolbar" aria-label="Toolbar with button groups">
                    <div class="btn-group me-4" role="group" aria-label="First group">
                        <a href="/instruction?id=<?= $_SESSION['assign_id'] ?>"><button type="button" class="btn btn-outline-primary <?= urlIs("/instruction") ? "active" : "active" ?> ">Instructions</button></a>
                    </div>
                    <div class="btn-group me-4" role="group" aria-label="Second group">
                        <a href="/student_work"><button type="button" class="btn btn-outline-info <?= urlIs("/student_work") ? "active" : "" ?>  ">Student work</button></a>
                    </div>
                </div>
            </ul>
        </div>
    </div>

    <section class="pt-0">
        <div class="container">

            <table class="table">
                <!-- PHP loop for classes START -->
                <tbody class="tbodySearch" id="tbodySearch">

                    <tr>
                        <!-- Course item -->
                        <td>
                            <div class="d-flex align-items-center justify-content-between">
                                <!-- Content -->
                                <div class="d-flex  ">
                                    <!-- Image -->
                                    <div class="w-100px " style="margin-right: -13px;">
                                        <img src="assets/images/about/download (2).png" class="rounded" alt="">
                                    </div>
                                    <div class="mb-0 ms-2 mt-2">
                                        <!-- Title -->
                                        <h3><a href="/instruction?id=<?php $assignment['id'] ?>"><?= $assignment['title'] ?></a></h3>
                                        <!-- Info -->
                                        <div>
                                            <p class="h6 fw-light mb-0 small me-3"><?= $_SESSION['user']['name'] ?> <?= $assignment['start_date'] ?></p>
                                            <br>
                                            <p class="h6 fw-light mb-0 small"></i><?= $assignment['score'] ?> Points</p>
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
                <p><?= $assignment['content'] ?></p>
                <h5>Document PDF</h5>
            </div>
            <hr>
            <div class="mb-0 ms-8">
                <p><i class="fas fa-user-graduate me-3"></i>Class comments</p>
            </div>

            <div class="ms-7 d-flex flex-row">
                <div class="avatar avatar-xl mt-n1 d-flex justify-content-center align-items-center">
                    <img class="avatar-xl rounded-circle border border-white border-1 shadow" style=" object-fit:cover; border-radius: 10%; margin-top: -1px " src="../../assets/images/profiles/<?= $_SESSION['user']['image'] ?>" alt="avatar">
                </div>

                <div class="border ms-4 " style="width: 1000px; height:120px;" >
                    <div class="">
                        <nav class="navbar">
                            <div class="container-fluid ">
                                <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
                                    <input type="text" class="form-control" name="classname" id="classname" required placeholder="Add class comment">
                                </button>
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
        </div>
        </div>
        </div>
        </div>
    </section>
</main>