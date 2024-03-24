<?php
require "database/database.php";
require "models/assignments/assignment.model.php";
require "models/user_join_class/student.model.php";
require "models/scores/score_assignment.model.php";
require "models/comments/comment.model.php";

if (isset($_SESSION['class_id'])) {
    $getScore = getScoreAssign($_GET['id']);
    $studentTurnedIn = getStudentTurnedIn($_GET['id'], $_SESSION['class_id']);
    $getstudentGraded = getStudentGraded($_GET['id']);
    $getstudentTurnIn = getStudentTurnIn($_GET['id']);
    $studentTurned = 0;
    $studentAssigned = 0;
    $studentGraded = 0;
}
if (isset($_GET['id'])) {
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
    $student_id = $_GET['student_id'];
    $assigment_id = $_GET['id'];
    $teacher_id = $_SESSION['user_created']['id'];
    $userInfo = getStudentInfo($student_id, $assigment_id);
    $getCommentPrivate = getPrivate($assigment_id, $student_id, $teacher_id);
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
    <form action="controllers/score/return_score.controller.php" method="post">
        <input type="hidden" name="id" value="<?= $_GET['id'] ?>">
        <div class=" d-flex justify-content-startbtn-toolbar align-items-center" role="toolbar" aria-label="Toolbar with button groups" style="margin-left: 70px;">
            <div class="btn-group me-4" role="group" aria-label="First group">
                <button type="submit" class="btn btn-primary" id="return" onclick="if (!confirm('You are returning score for student?')) { return false; }"> Return </button>
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

        <div class="contain d-flex" style="width: 100%;">
            <div class="left" style="width: 40%; border-right: 1px solid LightGray;">
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

                            <a  class="form-check-1 border p-2 d-flex align-items-center text-center">
                                <input type="hidden" name="student_id[]" value="<?= $student['id'] ?>">
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
                            <a class="form-check border p-2 d-flex align-items-center text-center">
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
                        $studentGraded += 1
                    ?>
                        <a  class="form-check border p-2 d-flex align-items-center text-center">
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
                                    <span><input type="text" id="point" name="point" class="custom-input" maxlength="3" value="<?= $student['score'] ?>" placeholder="......">/<?= $getScore['score'] ?></span>
                                </div>

                            </label>
                        </a>
                    <?php
                    endforeach;  ?>


                <?php }; ?>


            </div>
    </form>
    <!-- =====================Right bar ======================== -->

    <div class="right" style="width: 60%; margin: 20px;">
        <div class="ass-top">
            <a class="text-dark d-flex justify-content-end" href="/student_work?id=<?= $_GET['id'] ?>"><span class="material-symbols-outlined">close</span></a>
            <div class=" d-flex justify-content-between mt-3">
                <div class="name">
                    <p class="fs-5 text-dark"><?= strtoupper($userInfo['name']) ?></p>
                    <p class="small">Grade (see history)</p>
                </div>
                <?php if (!empty($_GET['grade'])) { ?>
                    <div class="grade fs-5 d-flex justify-content-center align-items-canter">
                        <p class="text-info fw-bold"><?= $_GET['grade'] ?>/</p>
                        <p><?= $getScore['score'] ?></p>
                    </div>
                <?php } else { ?>
                    <div class="grade">
                        <p class="fs-5">No grade</p>
                        <p class="small">Previously:0/100 - Not returned</p>

                    </div>
                <?php } ?>


            </div>
            <span class="d-inline-block shadow-sm" style="height: auto; width: 300px; margin-left: 30px;">
                <a class="d-flex border" style="border-radius: 10px; margin-left: -10px;" href="assets/images/upload/<?= $userInfo['document'] ?>">
                    <div class="bg p-2 border" style="border-radius: 10px 0 0 10px;">
                        <img src="/assets/images/bg/06.png" alt="">
                    </div>
                    <div class="title mx-3" style="margin-top: 30px;">
                        <h5 class="d-inline-block text-truncate" style="max-width: 150px;"><?= $userInfo['document'] ?></h5>
                        <p>PDF</p>
                    </div>

                </a>
            </span>

        </div>
        <hr>

        <div class="mb-0  ">
            <p><i class="fas fa-user-graduate mt-2 "></i>Private comments</p>
            <div class="">
                <nav class=" d-flex flex-column">
                    <?php foreach ($getCommentPrivate as $comment) :?>
                       
                        <div class="d-flex justify-content-between" style="margin-right: 70px;">

                            <div class="d-flex">
                                <div class="avatar avatar-md mt-n1 ">
                                    <img class="avatar-img rounded-circle border border-white border-5 shadow" src="../../assets/images/profiles/<?= $comment['image'] ?>" alt="">
                                </div>

                                <div class="ms-2 ">
                                    <div class="d-flex gap-3">
                                        <h6><?= strtoupper($comment['name']) ?></h6>
                                        <small><?= $comment['time'] ?></small>
                                    </div>
                                    <p><?= $comment['comment'] ?></p>
                                </div>

                            </div>
                            <div class="dropdown d-flex ms-6">
                                <a class="nav-link" href="#" id="pagesMenu" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <span class="material-symbols-outlined">more_vert</span></a>
                                <ul class="dropdown-menu" aria-labelledby="accounntMenu">
                                    <li class="dropdown-submenu dropend">
                                        <a class="dropdown-item " href="controllers/comment/delete_comments_teacher.controller.php?id=<?=$comment['comment_id']?>&student_id=<?= $student['user_id'] ?>" onclick="if (!confirm('Are you sure to Delete this comment?')) { return false; }">Delete</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    <?php endforeach; ?>
                    <form action="controllers/comment/comments_private.controller.php" method="post">
                        <input type="hidden" name="student_id" value="<?= $userInfo['id'] ?>">
                        <div class="navbar-toggler d-flex" data-bs-toggle="collapse" data-bs-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
                            <input type="hidden" name="class_id" value="<?= $_GET['id'] ?>">
                            <input type="text" style="width: 80%; height:50px; border-radius: 50px;" class="form-control bg-white col-6" name="class_name" id="classname" placeholder="Add private comment...">
                            <button type="submit" class="btn text-primary"><span class="material-symbols-outlined fs-3">send</span></button>
                        </div>
                    </form>
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

        .check {
            border: 2px solid black;
            border-radius: 0;

        }
    </style>

</main>