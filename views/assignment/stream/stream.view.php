<?php
if (isset($_GET['id'])) {
    $_SESSION['class_id'] = $_GET['id'];
    $id = $_GET['id'];
    date_default_timezone_set('Asia/Phnom_Penh');
    $assignments = getAssigns($id);
    $_SESSION['ass_id'] = $id;
   
}
?>
<main>
    <section class="pt-0">
        <!-- Main banner background image -->
        <div class="container-fluid px-0">
            <div class="bg-blue h-100px h-md-200px rounded-0" style="background:url(assets/images/pattern/04.png) no-repeat center center; background-size:cover;">
            </div>
        </div>
        <div class="container mt-n4">
            <div class="row">
                <!-- Profile banner START -->
                <div class="col-12">
                    <div class="card bg-transparent card-body p-0">
                        <div class="row d-flex justify-content-between">
                            <!-- Avatar -->
                            <div class="col-auto mt-4 mt-md-0">
                                <div class="avatar avatar-xxl mt-n3">
                                    <img class="avatar-img rounded-circle border border-white border-3 shadow" src="../../assets/images/profiles/<?= $_SESSION['user']['image'] ?>" alt="">
                                </div>
                            </div>
                            <!-- Profile info -->
                            <div class="col d-md-flex justify-content-between align-items-center mt-4">
                                <div>
                                    <h1 class="my-1 fs-4"><?= $_SESSION['user']['name'] ?><i class="bi bi-patch-check-fill text-info small"></i></h1>
                                    <ul class="list-inline mb-0">
                                        <li class="list-inline-item h6 fw-light me-3 mb-1 mb-sm-0"><i class="fas fa-star text-warning me-2"></i>4.5/5.0</li>
                                        <li class="list-inline-item h6 fw-light me-3 mb-1 mb-sm-0"><i class="fas fa-user-graduate text-orange me-2"></i>75+ Enrolled Students</li>
                                        <li class="list-inline-item h6 fw-light me-3 mb-1 mb-sm-0"><i class="fas fa-book text-purple me-2"></i>4 Modules</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Profile banner END -->
                </div>
            </div>
        </div>
    </section>
    <div class="container">
        <div class="row mb-5 align-items-center ">
            <!-- Search bar -->
            <script src="../../js/main.js"></script>
            <ul class="nav nav-pills nav-pills-bg-soft justify-content-sm-center mb-4 px-3" id="course-pills-tab" role="tablist">
                <div class="btn-toolbar " role="toolbar" aria-label="Toolbar with button groups">
                    <div class="btn-group me-4" role="group" aria-label="First group">
                        <a href="/stream?id=<?= $_SESSION['class_id'] ?>"><button type="button" class="btn btn-outline-primary <?= urlIs("/stream") ? "active" : "active" ?> ">Stream</button></a>
                    </div>
                    <div class="btn-group me-4" role="group" aria-label="Second group">
                        <a href="/classwork"><button type="button" class="btn btn-outline-info ">Classwork</button></a>
                    </div>
                    <div class="btn-group me-4" role="group" aria-label="Second group">
                        <a href="/people?id=<?= $_SESSION['class_id']?>"><button type="button" class="btn btn-outline-secondary <?= urlIs("/people") ? "active" : "" ?> ">Poeple</button></a>
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
    <section class="pt-0">
        <div class="container">
            <div class="row">
                <!-- Right sidebar START -->
                <div class="col-xl-3">
                    <!-- Responsive offcanvas body START -->
                    <nav class="navbar navbar-light navbar-expand-xl mx-0">
                        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
                            <!-- Offcanvas header -->
                            <div class="offcanvas-header bg-light">
                                <h5 class="offcanvas-title" id="offcanvasNavbarLabel">My profile</h5>
                                <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                            </div>
                            <!-- Offcanvas body -->
                            <?php if ($_SESSION['user']['role'] == 'teacher') : ?>
                                <div class="offcanvas-body p-3 p-xl-0">
                                    <div class="bg-dark border rounded-3 pb-0 p-3 w-100">
                                        <!-- Dashboard menu -->
                                        <div class="list-group list-group-dark list-group-borderless">
                                            <p>Class code</p>
                                            <a class="mb-4 gap-2 col-1 mx-auto" href="#"><span>4xfi6pn</span></a>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>
                            <br>
                            <div class="offcanvas-body p-3 p-xl-0">
                                <div class="bg-dark border rounded-3 pb-0 p-3 w-100">
                                    <!-- Dashboard menu -->
                                    <div class="list-group list-group-dark list-group-borderless">
                                        <p>Upcoming</p>
                                        <p>No work due soon</p>
                                        <a class="mb-4 gap-2 col-001 mx-auto " href="/todo"><span>View all</span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </nav>
                    <!-- Responsive offcanvas body END -->
                </div>
                <div class="col-xl-9">
                    <!-- Card START -->
                    <div class="card border rounded-3">
                        <!-- Card header START -->
                        <div class="card-header border-bottom">
                            <h3 class="mb-0">My Assignments List</h3>
                        </div>
                        <!-- Table body START -->
                        <div class="card-body">
                            <table class="table">
                                <!-- PHP loop for classes START -->

                                <tbody class="tbodySearch" id="tbodySearch">
                                    <?php if (count($assignments) == 0) { ?>
                                        <div class="d-flex">
                                            <img src="assets/images/bg/04.png" alt="">
                                            <div class="txt d-flex flex-column mt-5">
                                                <p class="text-info fs-4">This is where you can talk to your class</p>
                                                <p>Use the stream to share announcements, post assignments, and respond to student questions</p>

                                            </div>
                                        </div>
                                        <?php
                                    } else {
                                        foreach ($assignments as $assignment) :
                                            $date = date('F j, Y', strtotime($assignment['end_date']));
                                            $time = date('g:i A', strtotime($assignment['end_time']));
                                        ?>  
                                            <?php if ($_SESSION['user']['role'] == "teacher")  {?>
                                            <tr onclick="window.location='/instruction?id=<?= $assignment['id'] ?>';" style="cursor:pointer;">
                                            <?php } else { ?>
                                                <tr onclick="window.location='/assignment_student?id=<?= $assignment['id'] ?>';" style="cursor:pointer;">
                                                <!-- Course item -->
                                                <?php }?>
                                                <td>
                                                    <div class="d-flex align-items-center justify-content-between shadow-sm mb-3 bg-body rounded px-4 py-2 border-start border-primary">
                                                        <!-- Content -->
                                                        <div class="d-flex align-items-center">
                                                            <!-- Image -->
                                                            <div class="w-70px me-2">
                                                                <img src="assets/images/avatar/16.png" class="rounded" alt="">
                                                            </div>
                                                            <div class="mb-0 ms-2">
                                                                <!-- Title -->
                                                                    <p><a class="text-dark" href="#"> <?= $_SESSION['user']['name'] ?> posted a new assignment: <?= $assignment['title'] ?></a></p>
                                                                <div class="d-sm-flex">
                                                                    <p class="h6 fw-light mb-0 small me-3"><i class="fas fa-table text-orange me-2"></i><?= $assignment['end_date'] ?></p>
                                                                    <?php if ($_SESSION['user']['role'] == 'teacher') : ?>
                                                                        <p class="h6 fw-light mb-0 small"><i class="fas fa-check-circle text-success me-2"></i>0 Completed</p>
                                                                    <?php endif; ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- Buttons -->
                                                
                                                        <div class="dropdown mt-2 d-flex">
                                                            <a class="nav-link" href="#" id="pagesMenu" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <span class="material-symbols-outlined">more_vert</span></a>
                                                            <ul class="dropdown-menu" aria-labelledby="accounntMenu">
                                                                <?php if ($_SESSION['user']['role'] == 'teacher') : ?>
                                                                    <li class="dropdown-submenu dropend">
                                                                        <a class="dropdown-item " href="#">Move to top</a>
                                                                    </li>
                                                                    <li class="dropdown-submenu dropend">
                                                                        <a class="dropdown-item " href="controllers/assignment/edit_assignment.controller.php?id=<?= $assignment['id'] ?>">Edit</a>
                                                                    </li>
                                                                <?php endif; ?>
                                                                <li class="dropdown-submenu dropend">
                                                                    <a class="dropdown-item " href="# ">Copy Link</a>
                                                                </li>
                                                            </ul>
                                                        </div>

                                                    </div>

                                                </td>
                                                </a>
                                            </tr>
                                        <?php endforeach; ?>
                                    <?php }; ?>
                                </tbody>

                            </table>
                        </div>
                        <!-- PHP loop for classes END -->
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>