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
                        <a href="/instruction?id=<?= $_SESSION['assign_id'] ?>"><button type="button" class="btn btn-outline-primary<?= urlIs("/instruction") ? "active" : "" ?> ">Instruction</button></a>
                    </div>
                    <div class="btn-group me-4" role="group" aria-label="Second group">
                        <a href="/student_work"><button type="button" class="btn btn-outline-info <?= urlIs("/student_work") ? "active" : "" ?> ">Student work</button></a>
                    </div>
                </div>
            </ul>
        </div>
    </div>
    <hr>
    <div class="container">
        <div class="row mb-5 align-items-center">
            <!-- Search bar -->
            <script src="../../js/main.js"></script>
            <!-- <ul class="nav nav-pills nav-pills-bg-soft justify-content-sm-center mb-4 px-3" id="course-pills-tab" role="tablist"> -->
            <div class="btn-toolbar align-items-center" role="toolbar" aria-label="Toolbar with button groups">
                <div class="btn-group me-4" role="group" aria-label="First group">
                    <a href="/student_work"><button type="button" class="btn btn-primary ">Return</button></a>
                </div>
                <div class="btn-group me-4" role="group" aria-label="First group">
                    <a href="#"><button type="button" class="btn"><i class="bi bi-envelope fs-3"></i></button></a>
                </div>
                <div class="btn-group me-4" role="group" aria-label="Second group">
                    <div class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            100 points
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <div class="invite" data-bs-toggle="modal" data-bs-target="#Ungraded">
                                <span class=" p-5 bd-highlight">Ungraded</span>
                            </div>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- </ul> -->
        </div>
    </div>
    <section class="pt-0 d-flex ">
        <div class="card" style="width: 100%;">
            <div class="card-body">
                <div id="content">
                    <div class="col-xl-9 ms-4 " style="width: 50%;">
                        <div class="form-check d-flex justify-content-start">
                            <div class="ms-2">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">
                                </label>
                            </div>
                            <div class="ms-2">
                                <i class="fas fa-user-friends"></i>
                            </div>

                            <div class="ms-2">
                                <p><span><u>All student</u></span></p>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-7 ms-7">
                        <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">Sort by status</button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Sort by last name</a></li>
                            <li><a class="dropdown-item" href="#">Sort by first name</a></li>
                            <li><a class="dropdown-item" href="#">Sort by status</a></li>
                        </ul>
                    </div>
                    <table class="table table-bordered border-secondary">
                        <div class="ms-2  mb-4">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                            <label class="form-check-label" for="flexCheckDefault">
                                Turned in
                            </label>
                        </div>
                        <tr>
                            <th scope="col " class="d-flex">
                                <div class="ms-2">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault">
                                    </label>
                                </div>
                                <div class="avatar ">
                                    <img class="avatar-xxl rounded-circle border border-white border-1 shadow" style="width: 30px; height:30px; object-fit:cover; border-radius: 1%; margin-top: -1px " src="assets/images/avatar/02.jpg" alt="avatar">
                                </div>
                                <h5>Phal</h5>
                            </th>

                            <style>
                                .custom-input {
                                    border: none;
                                    width: 30px;
                                    height: 50px;
                                    font-size: 16px;
                                    outline: none;
                                    font-weight:bold;
                                    color:green;
                                }
                            </style>
                            <th>
                                <span><input type="text" class="custom-input" maxlength="3" placeholder="_____">/100</span>
                                
                            </th>
                        </tr>
                    </table>
                    <table class="table table-bordered border-secondary">
                        <div class="ms-2 mb-4">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                            <label class="form-check-label" for="flexCheckDefault">
                                Assigned
                            </label>
                        </div>
                        <tr>
                            <th scope="col" class="d-flex">
                                <div class="ms-2">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault">
                                    </label>
                                </div>
                                <div class="avatar ">
                                    <img class="avatar-xxl rounded-circle border border-white border-1 shadow" style="width: 30px; height:30px; object-fit:cover; border-radius: 1%; margin-top: -1px " src="assets/images/avatar/02.jpg" alt="avatar">
                                </div>
                                <h5>Phal</h5>
                            </th>
                            <th>
                                <span>.../100</span>
                                <p>Draft</p>
                            </th>
                        </tr>
                    </table>
                </div>
            </div>
        </div>

        <div class="card" style="width: 100%;">
            <!-- table student work -->
            <div class="card-body" style="width: 100%;">
                <div class="col-sm-6 " style="width: 100%;">
                    <div id="content" style="width: 100%;">

                        <p>Homework</p>
                        <p>
                        <div class="card-body d-flex">
                            <div class="card-body">
                                <h4>0</h4>
                                <p>Turned</p>
                            </div>
                            <div class="card-body">
                                <h4>0</h4>
                                <p>Assigned</p>
                            </div>
                        </div>
                        </p>
                        <p>
                        <div class="form-check form-switch ms-2">
                            <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" checked>
                            <label class="form-check-label" for="flexSwitchCheckChecked">Checked switch checkbox input</label>
                        </div>
                        </p>
                        <p>
                        <div class="input-group mb-3 ms-2">
                            <button class="btn btn-outline-secondary dropdown-toggle " type="button" data-bs-toggle="dropdown" aria-expanded="false">All</button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Turned in</a></li>
                                <li><a class="dropdown-item" href="#">Assigned</a></li>
                                <li><a class="dropdown-item" href="#">Graded</a></li>
                            </ul>
                        </div>
                        </p>
                    </div>
                    <!-- end table student work -->

                    <!-- card student work -->
                    <div class="row row-cols-1 row-cols-md-3 g-1">
                        <div class="col">
                            <div class="card">
                                <div scope="col" class="d-flex p-2">
                                    <div class="avatar ">
                                        <img class="avatar-xxl rounded-circle border border-white border-1 shadow" style="width: 30px; height:30px; object-fit:cover; border-radius: 1%; margin-top: -1px " src="assets/images/avatar/02.jpg" alt="avatar">
                                    </div>
                                    <h5>Phal</h5>
                                </div>
                                <div>
                                    <img src="assets/images/about/photo_2024-03-01_18-54-12.jpg" class="card-img-top ms-5" alt="..." style="width: 100px;">
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title fs-6 ">Special title treatment</h5>
                                    <span style="color:blue">Turned in</span>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card">
                                <div scope="col" class="d-flex p-2">
                                    <div class="avatar ">
                                        <img class="avatar-xxl rounded-circle border border-white border-1 shadow" style="width: 30px; height:30px; object-fit:cover; border-radius: 1%; margin-top: -1px " src="assets/images/avatar/02.jpg" alt="avatar">
                                    </div>
                                    <h5>Phal</h5>
                                </div>
                                <div>
                                    <img src="assets/images/about/photo_2024-03-01_18-54-12.jpg" class="card-img-top ms-5" alt="..." style="width: 100px;">
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title fs-6 ">No attachments</h5>
                                    <span style="color:blue">Assigned</span>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card">
                                <div scope="col" class="d-flex p-2">
                                    <div class="avatar ">
                                        <img class="avatar-xxl rounded-circle border border-white border-1 shadow" style="width: 30px; height:30px; object-fit:cover; border-radius: 1%; margin-top: -1px " src="assets/images/avatar/02.jpg" alt="avatar">
                                    </div>
                                    <h5>Phal</h5>
                                </div>
                                <div>
                                    <img src="assets/images/about/photo_2024-03-01_18-54-12.jpg" class="card-img-top ms-5" alt="..." style="width: 100px;">
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title fs-6 ">Special title treatment</h5>
                                    <span style="color:blue">Turned in</span>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card">
                                <div scope="col" class="d-flex p-2">
                                    <div class="avatar ">
                                        <img class="avatar-xxl rounded-circle border border-white border-1 shadow" style="width: 30px; height:30px; object-fit:cover; border-radius: 1%; margin-top: -1px " src="assets/images/avatar/02.jpg" alt="avatar">
                                    </div>
                                    <h5>Phal</h5>
                                </div>
                                <div>
                                    <img src="assets/images/about/photo_2024-03-01_18-54-12.jpg" class="card-img-top ms-5" alt="..." style="width: 100px;">
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title fs-6 ">No attachments</h5>

                                    <span style="color:blue">Assigned</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--  end card student work -->
                </div>
            </div>
        </div>
    </section>
</main>

<!-- --------------------------------------------------- -->

<!-- ungraded -->
<div class="modal fade" id="Ungraded" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"> invite students</h5>
            </div>
            <div class="modal-header">
                <p>Are you sure you want to update the point value of this assignment? Student who have already received grades will be notifed</p>
            </div>
            <div class="modal-footer">
                <a href="/student_work" class="me-3 btn border-secondary btn-light mb-0" type="button">Cancel</a>
                <!-- <button type="button" class="btn btn-light">cancel</button> -->
                <button type="button" class="btn btn-primary">Update</button>
            </div>
        </div>

    </div>
</div>

<!-- Invite students -->