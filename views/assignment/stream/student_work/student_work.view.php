<?php
require "database/database.php";
require "models/assignments/assignment.model.php";
require "models/user_join_class/student.model.php";
require "models/scores/score_assignment.model.php";
if (isset($_GET['id'])) {
    $assignments = getStudentsSubmitted($_GET['id']);
}
if (isset($_SESSION['class_id'])) {
    $getScore = getScoreAssign($_GET['id']);
    $studentTurnedIn = getStudentTurnedIn($_GET['id'], $_SESSION['class_id']);
    $getstudentGraded = getStudentGraded($_GET['id']);
    $getstudentTurnIn = getStudentTurnIn($_GET['id']);
    $studentTurned = 0;
    $studentAssigned = 0;
    $studentGraded = 0;
}
$id = $_SESSION['ass_id'];
date_default_timezone_set('Asia/Phnom_Penh');
$assignments = getAssigns($id);
foreach ($assignments as $assigment) {
    if ($assigment['id']) {
        $endDateTime = date($assigment['end_date'] . ' ' . $assigment['end_time']);
        $currentDateTime = date('Y-m-d H:i:s');
        $dateLineTime = ($endDateTime < $currentDateTime);
    }

    if ($_SESSION['user']['role'] == 'teacher') {
        if ($dateLineTime) {
            $missing = "Missing";
        }
    }
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
                        <a href="/instruction?id=<?= $_GET['id'] ?>"><button type="button" class="btn btn-outline-primary<?= urlIs("/instruction") ? "active" : "" ?> ">Instruction</button></a>
                    </div>
                    <div class="btn-group me-4" role="group" aria-label="Second group">
                        <a href="/student_work?id=<?= $_GET['id'] ?>"><button type="button" class="btn btn-outline-dark <?= urlIs("/student_work") ? "active" : "active" ?> ">Student work</button></a>
                    </div>
                </div>
            </ul>
        </div>
    </div>
    <hr>
    <!-- Search bar -->
    <script src="../../js/main.js"></script>
    <form action="controllers/score/return_score.controller.php" method="post" enctype="multipart/form-data g-3">
        <input type="hidden" name="id" value="<?= $_GET['id'] ?>">
        
        <div class=" d-flex justify-content-startbtn-toolbar align-items-center" role="toolbar" aria-label="Toolbar with button groups" style="margin-left: 70px;">
            <div class="btn-group me-4" role="group" aria-label="First group">
                <button type="submit" name="send" class="btn btn-primary" id="return" onclick="if (!confirm('You are returning score for student?')) { return false; }"> Return </button>
            </div>
            <div class="btn-group me-4" role="group" aria-label="First group">
                <a href="#"><button type="button" class="btn"><i class="bi bi-envelope fs-5"></i></button></a>
            </div>
            <div class="btn-group me-4" role="group" aria-label="Second group">
                <div class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="true">
                        <input type="text" value="<?= $getScore['score'] ?>" maxlength="3" id="score">points
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
        <!-- =====================Left bar ======================== -->

        <link rel="stylesheet" href="vendor/css/css/style.css">
        <link rel="stylesheet" href="vendor/css/css/animate.css">
        <div class="contain d-flex  " style="width: 100%;">
            <div class="contain d-flex " style="width: 50%; margin-top: 19px;">
                <div class="tag"></div>
                <div class="row p-3 mt-5 myrow  custom-row  " id="containers">
                    <div data-bs-spy="scroll" data-bs-target="#list-example" data-bs-offset="0" class="scrollspy-example" tabindex="0" id="containerse">
                        <div class="left" style="width: 100%; border-right: 1px solid LightGray; margin-top: 10px;">
                            <div class="dropdown p-3">
                                <button class="btn btn-white dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false" style="margin-left: 50px;">
                                    Sort by status
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                    <li><a class="dropdown-item mt-2" href="#">Sort by last name</a></li>
                                    <li><a class="dropdown-item mt-3" href="#">Sort by first name</a></li>
                                </ul>
                            </div>
                            <?php if (count($studentTurnedIn) > 0) { ?>
                                <a href="#" class="form-check bg-light p-3 d-flex align-items-center text-center">
                                    <input class="form-check-input mb-2 me-4 fs-5 check" type="checkbox" value="" id="flexCheckDefault" style="margin-left: 50px;">
                                    <label class="form-check-label" for="flexCheckDefault">
                                        <span class="text-dark" style="font-size: 17px;"> Turned in</span>
                                    </label>
                                </a>
                                <?php
                                foreach ($studentTurnedIn as $student) {
                                    if ($student['turned_in'] == true and $student['graded'] == false) :
                                        $studentTurned += 1
                                ?>

                                        <a href="/comment_private?id=<?= $_GET['id'] ?>&student_id=<?= $student['id'] ?>" class="form-check border p-2 d-flex align-items-center text-center">
                                            <input type="hidden" name="student_id[]" value="<?= $student['id']?>">
                                            <input class="form-check-input mb-2 me-4 fs-5 check" type="checkbox" value="" id="flexCheckDefault" style="margin-left: 60px;">
                                            <label class="form-check-label d-flex" for="flexCheckDefault" style="width: 100%;">
                                                <div class="name text-dark" style="font-size: 17px; width: 75%; border-right: 1px solid lightgray;">
                                                    <div class="d-flex align-items-center gap-3">
                                                        <img class="avatar-xxl rounded-circle border border-white border-1 shadow" style="width: 40px; height:40px; object-fit:cover; border-radius: 1%; margin-top: -1px " src="assets/images/profiles/<?= $student['image'] ?>" alt="avatar">
                                                        <div class="content">
                                                            <p class="mt-3 text-dark"><?= strtoupper($student['name']) ?></p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="score" style="width: 25%;">

                                                    <span class="text-dark"><input type="text" id="point" name="score[]" class="custom-input" maxlength="3" placeholder="......">/<?= $getScore['score'] ?></span>
                                                </div>
                                            </label>

                                        </a>
                                <?php endif;
                                } ?>
                                <a href="#" class="form-check bg-light p-3 d-flex align-items-center text-center">
                                    <input class="form-check-input mb-2 me-4 fs-5 check" type="checkbox" value="" id="flexCheckDefault" style="margin-left: 50px;">
                                    <label class="form-check-label" for="flexCheckDefault">
                                        <span class="text-dark" style="font-size: 17px;">Assigned</span>
                                    </label>
                                </a>
                                <?php

                                foreach ($studentTurnedIn as $student) :
                                    
                                    if ($student['turned_in'] == false and $student['graded'] == false) :

                                        $studentAssigned += 1
                                ?>
                                        <a href="/comment_private?id=<?= $_GET['id'] ?>&student_id=<?= $student['id'] ?>" class="form-check border p-2 d-flex align-items-center text-center">
                                            <input type="hidden" name="student_id[]" value="<?= $student['id'] ?>">
                                            <input type="hidden" name="no_file" value="No attachment">
                                            <input class="form-check-input mb-2 me-4 fs-5 check" type="checkbox" value="" id="flexCheckDefault" style="margin-left: 60px;">
                                            <label class="form-check-label d-flex" for="flexCheckDefault" style="width: 100%;">
                                                <div class="name text-dark" style="font-size: 17px; width: 75%; border-right: 1px solid lightgray;">
                                                    <div class="d-flex align-items-center gap-3">
                                                        <img class="avatar-xxl rounded-circle border border-white border-1 shadow" style="width: 40px; height:40px; object-fit:cover; border-radius: 1%; margin-top: -1px " src="assets/images/profiles/<?= $student['image'] ?>" alt="avatar">
                                                        <div class="content">
                                                            <p class="mt-3 text-dark"><?= strtoupper($student['name']) ?></p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="score text-dark" style="width: 25%;">
                                                    <span><input type="text" id="point" name="score[]" class="custom-input" maxlength="3" placeholder="......">/<?= $getScore['score'] ?></span>
                                                    <span class="text-danger"><?= isset($missing) ? $missing : "" ?></span>
                                                </div>

                                            </label>
                                        </a>
                                <?php endif;
                                endforeach;  ?>
                                <a href="#" class="form-check bg-light p-3 d-flex align-items-center text-center">
                                    <input class="form-check-input mb-2 me-4 fs-5 check" type="checkbox" value="" id="flexCheckDefault" style="margin-left: 50px;">
                                    <label class="form-check-label" for="flexCheckDefault">
                                        <span class="text-dark" style="font-size: 17px;">Graded</span>
                                    </label>
                                </a>
                                <?php
                                foreach ($getstudentGraded  as $student) :
                                    $studentGraded += 1;
                                ?>
                                    <a href="/comment_private?id=<?= $_GET['id'] ?>&student_id=<?= $student['user_id'] ?>&grade=<?= $student['score'] ?>" class="form-check border p-2 d-flex align-items-center text-center">
                                        <input class="form-check-input mb-2 me-4 fs-5 check" type="checkbox" value="" id="flexCheckDefault" style="margin-left: 60px;">
                                        <label class="form-check-label d-flex" for="flexCheckDefault" style="width: 100%;">
                                            <div class="name text-dark" style="font-size: 17px; width: 75%; border-right: 1px solid lightgray;">
                                                <div class="d-flex align-items-center gap-3">
                                                    <img class="avatar-xxl rounded-circle border border-white border-1 shadow" style="width: 40px; height:40px; object-fit:cover; border-radius: 1%; margin-top: -1px " src="assets/images/profiles/<?= $student['image'] ?>" alt="avatar">
                                                    <div class="content">
                                                        <p class="mt-3 text-dark"><?= strtoupper($student['name']) ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="score text-dark" style="width: 25%;">
                                                <span><input type="text" id="point" name="point" class="custom-input" maxlength="3" value="<?= $student['score'] ?>" placeholder="......">/<?= $getScore['score'] ?></span>
                                            </div>

                                        </label>
                                    </a>
                                <?php
                                endforeach;  ?>
                            <?php }; ?>

                        </div>
                    </div>
                </div>
            </div>

            <!-- =====================Right bar ======================== -->
            <div class="container mycontainer mt-5  " style="width: 100%; ">
                <div class="row myrow  custom-row " id="containers" style="width: 100%; margin-top: 20px; ">
                    <div data-bs-spy="scroll" data-bs-target="#list-example" data-bs-offset="0" class="scrollspy-example" tabindex="0" id="containerses">
                        <div class="contain d-flex " style=" width: 800px;">
                            <div class="tag"></div>
                            <div class="row myrow  custom-row " id="containers" style="width: 100%; margin-top: 20px; ">
                                <!-- <div data-bs-spy="scroll" data-bs-target="#list-example" data-bs-offset="0" class="scrollspy-example" tabindex="0" id="containerses"> -->
                                    <div class="title">
                                        <h5><?= $getScore['title'] ?></h5>
                                    </div>
                                    <div class="turn d-flex gap-3">
                                        <div class="right px-3" style="height: 70px;">
                                            <p class="fs-2"><?= $studentGraded ?></p>
                                            <p style="margin-top: -20px;">Graded</p>
                                        </div>
                                        <div class="right px-3" style="border-left: 1px solid gray; height: 70px;">
                                            <p class="fs-2"><?= $studentTurned ?></p>
                                            <p style="margin-top: -20px;" id="btn-turnIn">Turned in</p>
                                        </div>
                                        <div class="right px-3" style="border-left: 1px solid gray; height: 70px;">
                                            <p class="fs-2"><?= $studentAssigned ?></p>
                                            <p style="margin-top: -20px;">Assigned</p>
                                        </div>
                                    </div>
                                    <div class="form-check form-switch mt-4 m-3">
                                        <input checked class="form-check-input fs-5" type="checkbox" role="switch" id="flexSwitchCheckChecked">
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
                                    <?php if (count($studentTurnedIn) > 0) { ?>

                                        <div class="card gap-3 " style=" height: auto; width: 100%; display: flex; flex-wrap: wrap; flex-direction: row;">
                                            <?php foreach ($getstudentTurnIn as $student) {
                                                if ($student['status'] == true and $student['graded'] == false) :

                                            ?>
                                                    <div class="item p-2 bg-light shadow-sm" style=" width: 23%; ">
                                                        <div class="d-flex align-items-center gap-3">
                                                            <img class="avatar-xxl rounded-circle border border-white border-1 shadow" style="width: 30px; height:30px; object-fit:cover; border-radius: 1%; margin-top: -1px " src="assets/images/profiles/<?= $student['image'] ?>" alt="avatar">
                                                            <div class="content" style=" height: auto; width: 100%; display: flex; flex-wrap: wrap; flex-direction: row;">
                                                                <p class="mt-3 text-dark" style="width: 98%;"><?= strtoupper($student['name']) ?></p>
                                                            </div>
                                                        </div>
                                                        <span class="d-inline-block d-flex justify-content-center align-items-center">
                                                            <a class="d-flex shadow" style="margin-bottom: 20px;" href="assets/images/upload/<?= $student['document'] ?>">
                                                                <div class="bg p-2 " style="border-radius: 10px 0 0 10px;">
                                                                    <img src="/assets/images/bg/06.png" alt="">
                                                                </div>
                                                            </a>
                                                        </span>
                                                        <p class="text-success" style="margin-bottom: -8px; padding-bottom: 10px;">Turned in</p>
                                                    </div>
                                            <?php endif;
                                            } ?>

                                            <?php foreach ($studentTurnedIn as $student) {
                                                if ($student['turned_in'] == false and $student['graded'] == false) :
                                            ?>
                                                    <div class="item p-2 bg-light shadow-sm" style=" width: 23%; ">
                                                        <div class="d-flex align-items-center gap-3">
                                                            <img class="avatar-xxl rounded-circle border border-white border-1 shadow" style="width: 30px; height:30px; object-fit:cover; border-radius: 1%; margin-top: -1px " src="assets/images/profiles/<?= $student['image'] ?>" alt="avatar">
                                                            <div class="content" style=" height: auto; width: 100%; display: flex; flex-wrap: wrap; flex-direction: row;">
                                                                <p class="mt-3 text-dark" style="width: 98%;"><?= strtoupper($student['name']) ?></p>
                                                            </div>
                                                        </div>
                                                        <span class="d-inline-block d-flex justify-content-center align-items-center">
                                                            <a class="d-flex shadow" style="margin-bottom: 20px;">
                                                                <div class="bg p-2 " style="border-radius: 10px 0 0 10px;">
                                                                    <img src="/assets/images/bg/09.png" alt="">
                                                                </div>
                                                            </a>
                                                        </span>

                                                        <p class="text-primary" style="margin-bottom: -8px; padding-bottom: 10px;"><span class="text-danger"><?= isset($missing) ? $missing : "Assigned" ?></span></p>
                                                    </div>
                                            <?php endif;
                                            } ?>
                                            <?php foreach ($getstudentTurnIn as $student) {
                                                if ($student['graded'] == true) :

                                            ?>
                                                    <div class="item p-2 bg-light shadow-sm" style=" width: 23%; ">
                                                        <div class="d-flex align-items-center gap-3">
                                                            <img class="avatar-xxl rounded-circle border border-white border-1 shadow" style="width: 30px; height:30px; object-fit:cover; border-radius: 1%; margin-top: -1px " src="assets/images/profiles/<?= $student['image'] ?>" alt="avatar">
                                                            <div class="content" style=" height: auto; width: 100%; display: flex; flex-wrap: wrap; flex-direction: row;">
                                                                <p class="mt-3 text-dark" style="width: 98%;"><?= strtoupper($student['name']) ?></p>
                                                            </div>
                                                        </div>
                                                        <span class="d-inline-block d-flex justify-content-center align-items-center">
                                                            <a class="d-flex shadow" style="margin-bottom: 20px;" href="assets/images/upload/<?= $student['document'] ?>">
                                                                <div class="bg p-2 " style="border-radius: 10px 0 0 10px;">
                                                                    <img src="/assets/images/bg/06.png" alt="">
                                                                </div>
                                                            </a>
                                                        </span>
                                                        <p class="text-dark" style="margin-bottom: -8px; padding-bottom: 10px;">Graded</p>
                                                    </div>
                                            <?php endif;
                                            } ?>
                                        </div>

                                    <?php } else { ?>

                                        <div class="bg-image mt-4 d-flex flex-column gap-3 justify-content-center align-items-center ">
                                            <img src="assets/images/bg/08.png" alt="">
                                            <div class="para text-center">
                                                <h6>This hasn't been assigned to any </h6>
                                                <h6>students</h6>
                                                <div class="mt-3 text-center d-flex justify-content-center asign-items-center">
                                                    <a href="#" class="d-flex">
                                                        <i class="bi bi-person-plus-fill mx-3 fs-5"></i>
                                                        <p class="mt-1">Invite student</p>
                                                    </a>
                                                </div>

                                            </div>
                                        </div>
                                    <?php } ?>
                                <!-- </div> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </form>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const returnBtn = document.getElementById("return");
            const inputPoint = document.getElementById("point");

            inputPoint.addEventListener("input", (e) => {
                let valueInput = e.target.value.trim(); // Trim whitespace

                if (valueInput !== "") {
                    returnBtn.disabled = false;
                } else {
                    returnBtn.disabled = true;
                }
            });
        });
    </script>

    <style>
        .custom-input {
            border: none;
            width: 30px;
            height: 50px;
            font-size: 16px;
            outline: none;
            font-weight: bold;
            color: green;

        }

        #containerses {
            width: 100%;
        }
    </style>

</main>