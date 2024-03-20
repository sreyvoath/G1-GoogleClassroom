<?php
require "database/database.php";
require "models/assignments/assignment.model.php";
require "models/comments/comment.model.php";
require "models/scores/score_assignment.model.php";
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $_SESSION['assign_id'] = $id;
    $assignment = getAssign($id);
    $assignment = getAssign($id);
    $assignments = getAssignmentsStudents($_GET['id'], $_SESSION['user']['id']);
    $_SESSION['assignment_submitted'] = $assignments;
    $allCtms = showCmts($_GET['id']);
    $getScore = returnScore($_GET['id'], $_SESSION['user']['id']);
    $getPrivateComment = getPrivate($_GET['id'], $_SESSION['user']['id'], $_SESSION['user_created']['id']);
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
                                <div class="d-flex ">
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
                                        <div class="d-flex justify-content-between align-items-centerp-3 " style="width: 280%;">
                                            <?php if (!empty($getScore)) { ?>
                                                <div>
                                                    <p class="h6 fw-light mb-0 "><?= $getScore['score'] ?> /<?= $assignment['score'] ?> Points</p>
                                                </div>
                                            <?php } else { ?>
                                                <div>
                                                    <p class="h6 fw-light mb-0 "><?= $assignment['score'] ?> Points</p>
                                                </div>
                                            <?php } ?>
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
                    <span class="d-inline-block " style="height: auto; width: 400px;">
                        <a class="d-flex border shadow-sm" style="border-radius: 10px; margin-left: -40px; margin-top: -30px;" href="assets/images/upload/<?= $assignment['document'] ?>">
                            <div class="bg p-2 border" style="border-radius: 10px 0 0 10px;">
                                <img src="/assets/images/bg/06.png" alt="">
                            </div>
                            <div class="title mx-3" style="margin-top: 30px;">
                                <h5><?= $assignment['title'] ?></h5>
                                <p class="d-inline-block text-truncate" style="max-width: 150px;"><?= $assignment['document'] ?></p>
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
                <div class="avatar  bg-primary rounded-circle  " style="width: 10%;">
                    <img class="avatar-img rounded-circle border border-white border-3 shadow" src="../../assets/images/profiles/<?= $_SESSION['user']['image'] ?>" alt="">
                </div>
                <div class="border ms-4 rounded" style="width: 1000px;">

                    <div class="class-comment">

                        <div class="comment ms-3 mt-3 mb-3">
                            <button type="button" class="btn btn-light btn-sm d-flex justify-content-center align-items-center">
                                <span class="material-symbols-outlined" style="font-size: 20px;">group</span>
                                <p class="m-0"><?= count($allCtms) ?> classcomment</p>
                            </button>
                        </div>

                        <div id="comments">
                            <?php

                            foreach ($allCtms as $key => $value) :
                            ?>
                                <div class="d-flex ms-2" style="justify-content: space-between;">
                                    <div class="d-flex">
                                        <div class="avatar avatar-md mt-n1 ">
                                            <img class="avatar-img rounded-circle border border-white border-5 shadow" src="../../assets/images/profiles/<?= $value['image'] ?>" alt="">
                                        </div>
                                        <div class="ms-2 ">
                                            <div class="d-flex " style="justify-content: space-between;">
                                                <h6><?= $value['name'] ?><small> 20:20 am</small></h6>
                                            </div>
                                            <p><?= $value['comment'] ?></p>
                                        </div>
                                    </div>
                                    <div class="dropdown d-flex ">
                                        <a class="nav-link" href="#" id="pagesMenu" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <span class="material-symbols-outlined">more_vert</span></a>
                                        <ul class="dropdown-menu" aria-labelledby="accounntMenu">
                                            <li class="dropdown-submenu dropend">
                                                <a class="dropdown-item " href="controllers/comment/delete_comment_student.controller.php?id=<?= $value['comment_id'] ?> " onclick="if (!confirm('Are you sure to Delete this comment?')) { return false; }">Delete</a>
                                                <a class="dropdown-item " href="controllers/assignment/edit_assignment.controller.php?id=<?= $value['id'] ?>">Edit</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>

                    <script>
                        function toggleComments() {
                            var commentsDiv = document.getElementById("comments");
                            if (commentsDiv.style.display === "none") {
                                commentsDiv.style.display = "block";
                            } else {
                                commentsDiv.style.display = "none";
                            }
                        }
                    </script>
                    <div class="container-fluid ">
                        <form action="controllers/comment/comment_public.controller.php" method="post">
                            <div class="navbar-toggler d-flex" data-bs-toggle="collapse" data-bs-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
                                <input type="hidden" name="classid" value="<?= $_GET['id'] ?>">
                                <input type="text" style="width: 80%; height:50px;" class="form-control bg-white col-6" name="classname" id="classname">
                                <button type="submit" class="btn btn-outline-primary btn-sm ms-2" onclick="displayInput()"><span class="material-symbols-outlined">send</span></button>
                            </div>
                        </form>
                    </div>
                    <div id="display"></div>
                    <script>
                        function displayInput() {
                            // Get the value of the input field
                            var inputText = document.getElementById("classname").value;

                            // Create a new div element to display the input text
                            var displayDiv = document.createElement("div");
                            displayDiv.textContent = inputText;

                            // Append the new div element to the display area
                            document.getElementById("display").appendChild(displayDiv);
                        }
                    </script>


                    <div class="collapse" id="navbarToggleExternalContent">
                        <div class=" p-3">
                            <i class="fa fa-bold me-3" aria-hidden="true" onclick="toggleBold()"></i>
                            <i class="fa fa-italic me-3" aria-hidden="true" onclick="toggleItalic()"></i>
                            <i class="fa fa-underline me-3" aria-hidden="true" onclick="toggleUnderline()"></i>
                            <i class="fa fa-align-justify me-3" aria-hidden="true" onclick="toggleBulleted()"></i>
                            <i class="fa fa-text-width me-3" aria-hidden="true"></i>
                        </div>
                    </div>
                    <script>
                        function toggleBold() {
                            var input = document.getElementById('classname');
                            input.style.fontWeight = input.style.fontWeight === 'bold' ? 'normal' : 'bold';
                        }

                        function toggleItalic() {
                            var input = document.getElementById('classname');
                            input.style.fontStyle = input.style.fontStyle === 'italic' ? 'normal' : 'italic';
                        }

                        function toggleUnderline() {
                            var input = document.getElementById('classname');
                            input.style.textDecoration = input.style.textDecoration === 'underline' ? 'none' : 'underline';
                        }

                        function toggleBulleted() {
                            var input = document.getElementById('classname');
                            if (input.value.startsWith('• ')) {
                                input.value = input.value.substring(2); // Remove bullet point if already present
                            } else {
                                input.value = '• ' + input.value; // Add bullet point
                            }
                        };
                    </script>
                </div>

            </div>
        </div>
    </section>

    <!-- ========================================= Submittion ====================================================== -->
    <?php if (!empty($assignments)) { ?>
        <div class="container mt-5" style="width: 30%; ">
            <div class="p-3 mb-2 rounded shadow-sm p-3 mb-5 bg-body rounded" style="border: 1px solid gainsboro;">
                <div class="card-body d-flex justify-content-between text-center align-items-center ">
                    <p class="card-title fs-4">Your work</p>
                    <?php if ($assignments[0]['status'] == true) { ?>
                        <p class="card-text">Turned in</p>
                    <?php } else { ?>
                        <a href="controllers/assignment/assignment_student/send_assignment.controller.php?id=<?= $assignment['id'] ?>" class="btn btn-sm btn-success-soft btn-round mb-0" data-bs-toggle="tooltip" data-bs-placement="top" title="Turn In"><i class="bi bi-check2-circle fs-3"></i></a>
                    <?php }; ?>
                </div>
                <div class=" card-body rounded " style="width: 100%; margin-top: -70px;">
                    <div class="p-5">
                        <?php if (isset($assignments)) {
                            foreach ($assignments as $assignment) {
                        ?>
                                <span class="d-inline-block <?= ($assignments[0]['status'] == true ? "mt-3" : "") ?>" style="height: auto; width: 120%;">
                                    <a class="d-flex border shadow-sm align_items-center mb-0" style="border-radius: 10px; margin-left: -50px;" href="assets/images/upload/<?= $assignment['document'] ?>">
                                        <div class="bg p-2 border text-center" style="border-radius: 10px 0 0 10px;">
                                            <img src="/assets/images/bg/06.png" alt="" width="50px" height="40px">
                                        </div>
                                        <div class="d-flex flex-column title mx-2 mt-2 align-items-start justify-content-center d-inline-block text-truncate" style="width: 50%;">
                                            <p class="d-inline-block text-truncate" style="max-width: 150px;"><?= $assignment['document'] ?></p>
                                            <span style="margin-top: -10px;">PDF</span>

                                        </div>
                                    </a>
                                    <?php if ($assignments[0]['status'] == false) { ?>
                                        <a href="controllers/assignment/assignment_student/unsend_assignment.controller.php?id=<?= $assignment['id'] ?>" class="btn btn-sm btn-danger-soft btn-round mb-0 " style="  margin-left: 200px; margin-top: -95px;" data-bs-toggle="tooltip" data-bs-placement="top" title="Unsend"><i class="bi bi-x fs-4"></i></a>
                                    <?php } ?>
                                </span>
                        <?php }
                        } ?>

                    </div>
                    <div class="nav-item dropdown" style="margin-top: -40px;">
                        <?php if (isset($assignments)) : ?>
                            <?php if ($assignments[0]['status'] == false) { ?>
                                <form action="controllers/assignment/assignment_students.controller.php" method="post" id="upload-form" enctype="multipart/form-data">
                                    <input type="hidden" name="id" value="<?= $_GET['id'] ?>">
                                    <label for="file-upload" class="btn border-primary mb-3" style="width: 100%; cursor: pointer;">
                                        <i class="fa fa-plus me-3" aria-hidden="true"></i>
                                        <span>Add or Create</span>
                                    </label>
                                    <input id="file-upload" type="file" name="upload" style="display: none;">
                                    <button type="submit" class="btn btn-primary" style="width: 100%;">Assign</button>
                                </form>
                            <?php } else { ?>
                                <a href="controllers/assignment/assignment_student/unsubmit_assignment.controller.php?id=<?= $assignment['id'] ?>" type="submit" class="btn btn-outline-light mt-2" style="width: 100%;">Unsubmit</a>
                            <?php } ?>
                        <?php endif; ?>
                    </div>
                </div>

            </div>
        <?php } else { ?>
            <div class="container mt-5" style="width: 30%; ">
                <div class="p-3 mb-2 rounded shadow-sm p-3 mb-5 bg-body rounded" style="border: 1px solid gainsboro;">
                    <div class="card-body d-flex justify-content-between text-center align-items-center ">
                        <p class="card-title fs-4">Your work</p>
                    </div>
                    <div class=" card-body rounded " style=" margin-top: -30px;">
                        <img style="margin-top: -20px;" src="../../assets/images/bg/07.png" alt="bg">
                        <div class="nav-item dropdown">
                            <form action="controllers/assignment/assignment_students.controller.php" method="post" id="upload-form" enctype="multipart/form-data">
                                <input type="hidden" name="id" value="<?= $_GET['id'] ?>">
                                <label for="file-upload" class="btn border-primary mb-3" style="width: 100%; cursor: pointer;">
                                    <i class="fa fa-plus me-3" aria-hidden="true"></i>
                                    <span>Add or Create</span>
                                </label>
                                <input id="file-upload" type="file" name="upload" style="display: none;">
                                <button type="submit" class="btn btn-primary" style="width: 100%;">Turn in</button>
                            </form>
                        </div>
                    </div>

                </div>
            <?php } ?>
            <div class="p-1 mb-2 rounded shadow-sm mb-5 bg-body rounded" style="border: 1px solid gainsboro; margin-top: -20px;">
                <div class="mb-0 ms-3 ">
                    <p><i class="fas fa-user-graduate mt-2 me-3"></i>Private comments</p>
                    <div class="me-3 ">
                        <nav class="navbar">
                            <?php foreach ($getPrivateComment as $comment) : ?>
                                <div class="d-flex">

                                    <div class="d-flex">
                                        <div class="avatar avatar-md mt-n1 ">
                                            <img class="avatar-img rounded-circle border border-white border-5 shadow" src="../../assets/images/profiles/<?= $comment['image'] ?>" alt="">
                                        </div>
                                        <div class="ms-2 ">
                                            <div class="d-flex " style="justify-content: space-between;">
                                                <h6><?= $comment['name'] ?><small> 20:20 am</small></h6>
                                            </div>
                                            <p><?= $comment['comment'] ?></p>
                                        </div>
                                    </div>

                                    <div class="dropdown d-flex ms-6">
                                        <a class="nav-link" href="#" id="pagesMenu" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <span class="material-symbols-outlined">more_vert</span></a>
                                        <ul class="dropdown-menu" aria-labelledby="accounntMenu">
                                            <li class="dropdown-submenu dropend">
                                                <a class="dropdown-item " href="controllers/comment/delete_comment.controller.php?id=<?= $value['comment_id'] ?> " onclick="if (!confirm('Are you sure to Delete this comment?')) { return false; }">Delete</a>
                                                <a class="dropdown-item " href="controllers/assignment/edit_assignment.controller.php?id=<?= $value['id'] ?>">Edit</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                            <form action="controllers/comment/comment_private.controller.php" method="post">
                                <div class="navbar-toggler d-flex" data-bs-toggle="collapse" data-bs-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
                                    <input type="hidden" name="classid" value="<?= $_GET['id'] ?>">
                                    <input type="text" style="width: 80%; height:50px;" class="form-control bg-white col-6" name="classname" id="classname">
                                    <button type="submit" class="btn btn-outline-primary ms-1" onclick="displayInput()"><span class="material-symbols-outlined">send</span></button>
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
</main>