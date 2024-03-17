<?php
require "database/database.php";
require "models/assignments/assignment.model.php";
require "models/user_join_class/student.model.php";
if (isset($_GET['id'])) {
    $assignments = getStudentsSubmitted($_SESSION['assign_id']);
}
if (isset($_SESSION['class_id'])) {
    $studentJoined = studentJoinedClass($_SESSION['class_id']);
}

?>
<main>
    <div class="container">
        <div class="row align-items-center ">
            <!-- Search bar -->
            <script src="../../js/main.js"></script>
            <ul class="nav nav-pills nav-pills-bg-soft justify-content-sm-center mb-4 px-3" id="course-pills-tab" role="tablist">
                <div class="btn-toolbar align-items-center justify-content-evenly" role="toolbar" aria-label="Toolbar with button groups">
                    <div class="btn-group me-4" role="group" aria-label="First group">
                        <a href="/instruction?id=<?= $_SESSION['assign_id'] ?>"><button type="button" class="btn btn-outline-primary<?= urlIs("/instruction") ? "active" : "" ?> ">Instruction</button></a>
                    </div>
                    <div class="btn-group me-4" role="group" aria-label="Second group">
                        <a href="/student_work?id=<?= $_SESSION['assign_id'] ?>"><button type="button" class="btn btn-outline-dark <?= urlIs("/student_work") ? "active" : "active" ?> ">Student work</button></a>
                    </div>
                </div>
            </ul>
        </div>
    </div>
    <hr>
    <!-- Search bar -->
    <script src="../../js/main.js"></script>
    <form action="" style="margin-left: 70px;">
        <div class=" d-flex justify-content-startbtn-toolbar align-items-center" role="toolbar" aria-label="Toolbar with button groups">
            <div class="btn-group me-4" role="group" aria-label="First group">
                <button disabled type="button" class="btn btn-primary"> Return </button>
            </div>
            <div class="btn-group me-4" role="group" aria-label="First group">
                <a href="/student_work"><button type="button" class="btn"><i class="bi bi-envelope fs-5"></i></button></a>
            </div>
            <div class="btn-group me-4" role="group" aria-label="Second group">
                <div class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="true">
                        <input type="text" value="100" maxlength="3" id="score">points
                    </a>
                    <style>
                        #score {
                            border: none;
                            width: 40px;
                            font-size: 15px;
                            outline: none;
                            border-bottom: 2px solid palevioletred;
                        }
                    </style>
                </div>
            </div>
        </div>
        <hr>
        <div class="contain d-flex" style="width: 100%;">
            <div class="left" style="width: 40%; border-right: 1px solid LightGray;">
                <div class="form-check  d-flex align-items-center text-center">
                    <input class="form-check-input mb-2 me-2 fs-5" type="checkbox" value="" id="flexCheckDefault">
                    <label class="form-check-label" for="flexCheckDefault">
                        <i class="bi bi-people-fill mx-2 text-info fs-5"></i><span style="font-size: 17px;">All students</span>
                    </label>
                </div>
                <div class="dropdown mt-3 mx-2">
                    <button class="btn btn-white dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                        Sort by status
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                        <li><a class="dropdown-item mt-2" href="#">Sort by last name</a></li>
                        <li><a class="dropdown-item mt-3" href="#">Sort by first name</a></li>
                    </ul>
                </div>
            </div>
            <div class="right" style="width: 60%; margin-left: 20px;">
                <div class="title">
                    <h5>Test 2</h5>
                </div>
                <div class="turn d-flex gap-3">
                    <div class="right px-3" style="height: 70px;">
                        <p class="fs-2">0</p>
                        <p style="margin-top: -20px;">Graded</p>
                    </div>
                    <div class="right px-3" style="border-left: 1px solid gray; height: 70px;">
                        <p class="fs-2">0</p>
                        <p style="margin-top: -20px;">Turned in</p>
                    </div>
                    <div class="right px-3" style="border-left: 1px solid gray; height: 70px;">
                        <p class="fs-2">0</p>
                        <p style="margin-top: -20px;">Assigned</p>
                    </div>
                </div>
                <div class="form-check form-switch mt-4 m-3">
                    <input class="form-check-input fs-5" type="checkbox" role="switch" id="flexSwitchCheckChecked">
                    <label class="form-check-label mt-1" style="font-size: 17px;" for="flexSwitchCheckChecked">Not accepting submissions</label> <i class="bi bi-info-circle mx-2"></i>
                </div>
                <div class="dropdown mt-3">
                    <button class="btn btn-white dropdown-toggle " type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                        All
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                        <li><a class="dropdown-item mt-2" href="#">Turned in</a></li>
                        <li><a class="dropdown-item mt-3" href="#">Assigned</a></li>
                        <li><a class="dropdown-item mt-3" href="#">Graded</a></li>

                    </ul>
                </div>
                <div class="bg-image mt-5 d-flex flex-column gap-3 justify-content-center align-items-center ">
                    <img src="assets/images/bg/08.png" alt="">
                    <div class="para text-center">
                        <h6>This hasn't been assigned to any </h6>
                        <h6>students</h6>
                    </div>
                </div>
            </div>
        </div>
    </form>

</main>