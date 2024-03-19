<?php
require "database/database.php";
require "models/assignments/assignment.model.php";
require "models/comments/comment.model.php";
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
                        <a href="/student_work?id=<?= $_SESSION['assign_id'] ?>"><button type="button" class="btn btn-outline-dark <?= urlIs("/student_work") ? "active" : "" ?>  ">Student work</button></a>
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
                                        <h3><a href="#"><?= $assignment['title'] ?></a></h3>
                                        <!-- Info -->
                                        <div>
                                            <p class="h6 fw-light mb-0 small me-3"><?= $_SESSION['user']['name'] ?> <?= $assignment['start_date'] ?></p>
                                            <br>
                                            <p class="h6 fw-light mb-0 small"></i><?= $assignment['score'] ?> Points</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="dropdown mt-2 d-flex">
                                    <a class="nav-link" href="#" id="pagesMenu" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <span class="material-symbols-outlined">more_vert</span></a>
                                    <ul class="dropdown-menu" aria-labelledby="accounntMenu">
                                        <li class="dropdown-submenu dropend">
                                            <a class="dropdown-item " href="controllers/assignment/edit_assignment.controller.php?id=<?= $assignment['id'] ?>">Edit</a>
                                        </li>
                                        <li class="dropdown-submenu dropend">
                                            <a class="dropdown-item " href="controllers/assignment/delete_assignment.controller.php?id=<?= $assignment['id'] ?> " onclick="if (!confirm('Are you sure to Delete it?')) { return false; }">Delete</a>
                                        </li>
                                        <li class="dropdown-submenu dropend">
                                            <a class="dropdown-item " href="# ">Copy Link</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </td>
                    </tr>

                </tbody>

                <!-- PHP loop for classes END -->
            </table>
            <div class="mb-0 ms-8" style="margin-left: -10px; padding-bottom: 30px;">
                <p><?= $assignment['content'] ?></p>
                <div class="p-3">
                    <span class="d-inline-block" style="height: auto; width: 400px;">
                        <a class="d-flex border" style="border-radius: 10px; margin-left: -30px; margin-top: -20px; margin-bottom: 30px;" href="assets/images/upload/<?= $assignment['document'] ?>">
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
                <!-- Image -->
                <div class="avatar avatar-lg">
                    <img class="avatar-img rounded-circle border border-white border-5 shadow" src="../../assets/images/profiles/<?= $_SESSION['user']['image'] ?>" alt="">
                </div>

                <div class="border ms-4 rounded" style="width: 1000px;">
                    <div class="class-comment">

                        <div class="comment ms-3 mt-3 mb-3">
                            <button type="button" class="btn btn-light btn-sm d-flex justify-content-center align-items-center">
                                <span class="material-symbols-outlined" style="font-size: 20px;">group</span>
                                <p class="m-0">3 classcomment</p>
                            </button>
                        </div>

                        <div id="comments" >
                            <?php
                            $allCtms = showCmts($_GET['id']);
                            foreach ($allCtms as $key => $value) :
                            ?>
                                <div class="d-flex " style="justify-content: space-between;">
                                    <div class="d-flex">
                                     <div class="avatar avatar-md mt-n1 ms-4">
                                        <img class="avatar-img rounded-circle border border-white border-5 shadow" src="../../assets/images/profiles/<?= $value['image'] ?>" alt="">
                                    </div>
                                    <div class="ms-2">
                                        <h6><?= $value['name'] ?></h6>
                                        <p><?= $value['comment'] ?></p>
                                    </div>
                                    </div>
                                    <div class="dropdown mt-2 d-flex ">
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
                            <form action="controllers/comment/teacher_comment.controller.php" method="post">
                                <div class="navbar-toggler d-flex" data-bs-toggle="collapse" data-bs-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
                                    <input type="hidden" name="classid" value="<?= $_GET['id'] ?>">
                                    <input type="text" style="width: 80%; height:50px;" class="form-control bg-white col-6" name="classname" id="classname">
                                    <button type="submit" class="btn btn-outline-primary ms-2" onclick="displayInput()"><span class="material-symbols-outlined">send</span></button>
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
        </div>
    </section>
</main>