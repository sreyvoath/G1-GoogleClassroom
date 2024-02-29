<?php
$assigments = $_SESSION['assignments'];
foreach ($assigments as $assigment) :
?>

    <main>
        <div class="container">
            <div class="row mb-5 align-items-center ">
                <!-- Search bar -->
                <script src="../../js/main.js"></script>
                <ul class="nav nav-pills nav-pills-bg-soft justify-content-sm-center mb-4 px-3" id="course-pills-tab" role="tablist">
                    <div class="btn-toolbar align-items-center justify-content-evenly" role="toolbar" aria-label="Toolbar with button groups">
                        <div class="btn-group me-4" role="group" aria-label="First group">
                            <a href="/stream?id=<?= $_SESSION['class_id'] ?>"><button type="button" class="btn btn-outline-primary <?= urlIs("/stream") ? "active" : "" ?>">Stream</button></a>
                        </div>
                        <div class="btn-group me-4" role="group" aria-label="Second group">
                            <a href="/classwork"><button type="button" class="btn btn-outline-info <?= urlIs("/classwork") ? "active" : "" ?> ">Classwork</button></a>
                        </div>
                        <div class="btn-group me-4" role="group" aria-label="Second group">
                            <a href="/people"><button type="button" class="btn btn-outline-secondary <?= urlIs("/people") ? "active" : "" ?>">Poeple</button></a>
                        </div>
                        <div class="btn-group me-4" role="group" aria-label="Third group">
                            <a href="/point"><button type="button" class="btn btn-outline-success <?= urlIs("/grade") ? "active" : "" ?>">Grades</button></a>
                        </div>
                    </div>
                </ul>
            </div>
        </div>
        <section class="pt-0">
            <div class="container">
                <div class="row">

                    <div class="col-xl-12 d-flex justify-content-end " style="margin-top: -40px; ">
                        <!-- Card START -->
                        <a href="/create-work" class="btn btn-primary shadow" style="border-radius: 50px;">
                            <i class="bi bi-plus-lg me-2 "></i>
                            <span>Assignment</span>
                        </a>
                    </div>
                    <div class="dropdown-submenu dropend shadow-sm p-2 mb-5 bg-body rounded px-4 py-2 d-flex justify-content-between">
                        <div class="left d-flex gap-3">
                            <div class="circle bg-info col-1 text-center" style="width: 50px; border-radius: 50px;">
                                <span class="material-symbols-outlined fs-2 text-white pt-2">assignment</span>
                            </div>
                            <div class="title mt-3">
                                <h6><a href="#"><?= $assigment['title'] ?></a></h6>
                            </div>
                        </div>
                        <div class="dropdown mt-2">
                            <a class="nav-link" href="#" id="pagesMenu" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <span class="material-symbols-outlined">more_vert</span></a>
                            <ul class="dropdown-menu" aria-labelledby="accounntMenu">
                                <li class="dropdown-submenu dropend">
                                    <a class="dropdown-item " href="#">Edit</a>
                                </li>
                                <li class="dropdown-submenu dropend">
                                    <a class="dropdown-item " href="#">Delete</a>
                                </li>
                                <li class="dropdown-submenu dropend">
                                    <a class="dropdown-item " href="#">Copy Link</a>
                                </li>
                            </ul>
                        </div>

                    </div>
                </div>
            <?php endforeach; ?>
            </div>
            </div>
            </div>
        </section>
    </main>