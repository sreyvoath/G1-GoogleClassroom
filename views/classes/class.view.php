<!-- Popular course START -->
<section>
    <div class="container">
        <!-- Title -->
        <div class="row mb-4">
            <div class="col-lg-8 mx-auto text-center">
                <h2 class="fs-2 text-primary" style="margin-top: -50px;">Current Classroom</h2>
                <p class="mb-0">Choose your classroom each courses you learn </p>
            </div>
        </div>
        <!-- Tabs content START -->
        <div class="tab-content" id="course-pills-tabContent">
            <!-- Content START -->
            <div class="tab-pane fade show active" id="course-pills-tabs-1" role="tabpanel" aria-labelledby="course-pills-tab-1">
                <div class="row g-4">
                    <!-- Card item START -->
                    <?php
                    $classes = getClasses();
                    foreach ($classes as $class) :
                        if ($class['archive'] == 0) :
                    ?>
                            <div class="col-sm-6 col-lg-4 col-xl-3">
                                <div class="card shadow h-100">
                                    <!-- Image -->
                                    <img src="../../assets/images/classes/<?= $class['image'] ?>"  class="card-img-top" alt="course image" style='width:350px; height:200px'>
                                    <!-- <li class="dropdown-submenu dropend">
                        </li> -->
                                    <!-- Card body -->
                                    <div class="nav-item dropdown d-flex justify-content-end">
                                        <a class="nav-link " href="#" id="pagesMenu" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></a>
                                        <ul class="dropdown-menu" aria-labelledby="accounntMenu">
                                            <li class="dropdown-submenu dropend">
                                                <a class="dropdown-item " href="">Create</a>
                                            </li>
                                            <li class="dropdown-submenu dropend">
                                                <a class="dropdown-item " href="#">Delete</a>
                                            </li>
                                            <li class="dropdown-submenu dropend">
                                                <a class="dropdown-item " href="#">Edit</a>
                                            </li>

                                        </ul>

                                    </div>
                                    <div class="card-body pb-0">
                                        <!-- Title -->
                                        <h5 class="card-title fw-normal"><a class="text-decoration-none" href="#"><?= $class['title']; ?></a></h5>
                                        <p class="mb-2 text-truncate-2"><?= $class['section']; ?></p>
                                    </div>
                                    <!-- Card footer -->
                                    <div class="card-footer pt-3 pb-3">
                                        <div class="d-flex">
                                            <a href="../../controllers/classes/class.edit.controller.php?id=<?= $class['id'] ?>" class="btn mx-1 h6 fw-light mb-0 btn-outline-info text-white"><i class="bi bi-pen text-dark "></i></a>
                                            <a href="../../controllers/classes/class.delete.controller.php?id=<?= $class['id'] ?>" class="btn mx-1 h6 fw-light mb-0 btn-outline-danger"><i class="fas fa-trash text-danegr "></i></a>
                                            <a href="../../controllers/classes/class.archive.controller.php?id=<?= $class['id'] ?>" class="btn mx-1 h6 fw-light mb-0 btn-outline-secondary"><i class="bi bi-archive-fill"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        <?php endif ?>
                    <?php endforeach ?>
                    <!-- Card item END -->
                </div>
            </div>
            <!-- Content END -->
            <!-- Tabs content END -->
        </div>
</section>