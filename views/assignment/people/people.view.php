<?php
// Import neccessary files
require "database/database.php";
require "models/user_join_class/class.model.php";
require "models/user_join_class/student.model.php";

//Call function here 
$userCreated = getUserCreateClass($_SESSION['class_id']);
$studentJoined = studentJoinedClass($_SESSION['class_id']);

$_SESSION['user_created'] = $userCreated;


?>


<main>
    <div class="container">
        <div class="row mb-5 align-items-center ">

            <!------------------- Category --------------------->

            <script src="../../js/main.js"></script>
            <ul class="nav nav-pills nav-pills-bg-soft justify-content-sm-center mb-4 px-3" id="course-pills-tab" role="tablist">
                <div class="btn-toolbar align-items-center justify-content-evenly" role="toolbar" aria-label="Toolbar with button groups">
                    <div class="btn-group me-4" role="group" aria-label="First group">
                        <a href="/stream?id=<?= $_SESSION['class_id'] ?>"><button type="button" class="btn btn-outline-primary <?= urlIs("/stream") ? "active" : "" ?> ">Stream</button></a>
                    </div>
                    <div class="btn-group me-4" role="group" aria-label="Second group">
                        <a href="/classwork"><button type="button" class="btn btn-outline-info <?= urlIs("/classwork") ? "active" : "" ?> ">Classwork</button></a>
                    </div>
                    <div class="btn-group me-4" role="group" aria-label="Second group">
                        <a href="/people"><button type="button" class="btn btn-outline-secondary <?= urlIs("/people") ? "active" : "" ?> ">Poeple</button></a>
                    </div>
                    <?php if ($_SESSION['user']['role'] == 'teacher') : ?>
                        <div class="btn-group me-4" role="group" aria-label="Third group">
                            <a href="/grade"><button type="button" class="btn btn-outline-success <?= urlIs("/point") ? "active" : "" ?> ">Grades</button></a>
                        </div>
                    <?php endif; ?>
                </div>
            </ul>
        </div>
    </div>

    <!------------- Lists both teachers and students ------------------->

    <section class="pt-0">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">

                    <!------------------- For teachers list ---------------------->

                    <!-- Card START -->
                    <div class="card border rounded-3">
                        <!-- Card header START -->
                        <div class="card-header border-bottom bg-purple text-white  d-flex text-align-center justify-content-between">
                            <h3 class="mb-0 text-white">Teachers</h3>
                            <?php if ($_SESSION['user']['role'] == 'teacher') : ?>
                                <div class="invite" data-bs-toggle="modal" data-bs-target="#inputTag">
                                    <span class="material-symbols-outlined" style="font-size: 30px;">group_add</span>
                                </div>
                            <?php endif; ?>
                        </div>
                        <!-- Table body START -->
                        <div class="card-body">
                            <table class="table">
                                <!-- PHP loop for classes START -->
                                <tbody class="tbodySearch" id="tbodySearch">
                                    <tr>
                                        <!-- Course item -->
                                        <td>
                                            <div class="d-flex align-items-center justify-content-between">
                                                <!-- Content -->
                                                <div class="d-flex align-items-center">
                                                    <!-- Image -->
                                                    <div class="avatar avatar-lg mt-n3">
                                                        <img class="avatar-img rounded-circle border border-white border-5 shadow" src="../../assets/images/profiles/<?= $userCreated['image'] ?>" alt="">
                                                    </div>

                                                    <div class="mb-0 ms-2">
                                                        <!-- Title -->
                                                        <h6><a href="#"><?= strtoupper($userCreated['name']) ?></a></h6>
                                                    </div>
                                                </div>
                                                <!-- Buttons -->
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                                <!-- PHP loop for classes END -->
                            </table>
                        </div>
                    </div>

                    <!-------------- For students list ------------------->

                    <div class="card border rounded-3 mt-5">
                        <!-- Card header START -->
                        <div class="card-header border-bottom bg-purple text-white  d-flex text-align-center justify-content-between">
                            <h3 class="mb-0 text-white">Students</h3>
                            <?php if ($_SESSION['user']['role'] == 'teacher') : ?>
                                <div class="invite" data-bs-toggle="modal" data-bs-target="#inputtageStudent">
                                    <span class="material-symbols-outlined" style="font-size: 30px;">group_add</span>
                                </div>
                            <?php endif; ?>
                        </div>
                        <!-- Table body START -->
                        <div class="card-body">
                            <table class="table">
                                <!-- PHP loop for classes START -->
                                <tbody class="tbodySearch" id="tbodySearch">
                                    <?php if (count($studentJoined) == 0) : ?>
                                        <div class="img d-flex justify-content-center">
                                            <img src="assets/images/avatar/17.png" alt="">
                                        </div>
                                        <p class="d-flex justify-content-center fs-5">Add student to this class</p>

                                    <?php endif; ?>
                                    <?php foreach ($studentJoined as $student) : ?>
                                        <tr>
                                            <!-- Course item -->
                                            <td>
                                                <div class="d-flex align-items-center justify-content-between">
                                                    <!-- Content -->

                                                    <div class="d-flex align-items-center">
                                                        <?php if ($_SESSION['user']['role'] == 'teacher') : ?>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                                            </div>
                                                        <?php endif; ?>
                                                        <div class="avatar avatar-lg mt-n3 ms-3">
                                                            <img class="avatar-img rounded-circle border border-white border-5 shadow" src="../../assets/images/profiles/<?= $student['image'] ?>" alt="">
                                                        </div>

                                                        <div class="mb-0 ms-2">
                                                            <!-- Title -->
                                                            <h6><a href="#"><?= strtoupper($student['name']) ?></a></h6>
                                                            <!-- Info -->
                                                        </div>
                                                    </div>
                                                    <!-- Buttons -->
                                                    <?php if ($_SESSION['user']['role'] == 'teacher') {  ?>
                                                        <div class="dropdown">
                                                            <a class="nav-link" href="#" id="pagesMenu" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <span class="material-symbols-outlined">more_vert</span></a>

                                                            <ul class="dropdown-menu" aria-labelledby="accounntMenu">
                                                                <li class="dropdown-submenu dropend">
                                                                    <a class="dropdown-item " href="#">Email</a>
                                                                </li>
                                                                <li class="dropdown-submenu dropend">
                                                                    <a class="dropdown-item " href="#">Remove</a>
                                                                </li>
                                                            </ul>


                                                        </div>
                                                    <?php } else { ?>
                                                        <a href="#" class="btn btn-success-soft btn-round me-1 mb-0" data-bs-toggle="tooltip" data-bs-placement="top" title="<?= $student['email']?>"><i class="far fa-envelope"></i></a>
                                                    <?php } ?>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
    </section>
</main>

<!------------------Popup invite teacher -------------------------->

<!-- input tag teacher box -->
<div class="modal fade" id="inputTag" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"> invite teacher</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="myForm" action="controllers/classes/class.create.controller.php" method="post" enctype="multipart/form-data g-3">
                    <div class="mb-3">
                        <input type="email" class="form-control" id="email" placeholder="Type a name or email" name="email">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label"></label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="8"></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <a href="/people" class="me-3 btn border-secondary btn-light mb-0" type="button">Cancel</a>
                <!-- <button type="button" class="btn btn-light">cancel</button> -->
                <button type="button" class="btn btn-primary">invite</button>
            </div>
        </div>
    </div>
</div>

<!------------------------- Popup invite students ------------------------->

<div class="modal fade" id="inputtageStudent" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"> invite students</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="myForm" action="controllers/classes/class.create.controller.php" method="post" enctype="multipart/form-data g-3">
                    <div class="mb-3">
                        <input type="text" class="form-control" id="title" placeholder="Type a name or email" name="title">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label"></label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="8"></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <a href="/people" class="me-3 btn border-secondary btn-light mb-0" type="button">Cancel</a>
                <!-- <button type="button" class="btn btn-light">cancel</button> -->
                <button type="button" class="btn btn-primary">invite</button>
            </div>
        </div>
    </div>
</div>