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

        <div class="row mb-4  align-items-center">
            <!-- Search bar -->
            <div class="col-sm-6 col-xl-4">
                <form class="bg-body shadow rounded p-2">
                    <div class="input-group input-borderless">
                        <input class="form-control me-1" type="search" placeholder="Search instructor">
                        <button type="button" class="btn btn-primary mb-0 rounded"><i class="fas fa-search"></i></button>
                    </div>
                </form>
            </div>

            <!-- Select option -->
            <?php
            require_once "models/class.model.php";
            require_once "database/database.php";
            $classes = getClasses();


            ?>
            <div class="col-sm-6 col-xl-3 mt-3 mt-lg-0">
                <form class="bg-body shadow rounded p-2 input-borderless">
                    <select class="form-select form-select-sm js-choice" aria-label=".form-select-sm">
                        <option disabled selected>All Classes</option>
                        <?php foreach ($classes as $class) : ?>
                            <option><?= $class['title'] ?></option>
                        <?php endforeach; ?>



                    </select>
                </form>
            </div>




            <!-- Select option -->
            <div class="col-sm-6 col-xl-3 mt-3 mt-xl-0">
                <form class="bg-body shadow rounded p-2 input-borderless">
                    <select class="form-select form-select-sm js-choice" aria-label=".form-select-sm">
                        <option value="">Sort by</option>
                        <option>Most popular</option>
                        <option>Most viewed</option>
                        <option>Top rated</option>
                    </select>
                </form>
            </div>

            <!-- Button -->
            <div class="col-sm-6 col-xl-2 mt-3 mt-xl-0 d-grid">
                <a href="#" class="btn btn-lg btn-primary mb-0">Filter Results</a>
            </div>
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
                            <div class="offcanvas-body p-3 p-xl-0">
                                <div class="bg-dark border rounded-3 pb-0 p-3 w-100">
                                    <!-- Dashboard menu -->
                                    <div class="list-group list-group-dark list-group-borderless">

                                        <a class="list-group-item active" href="/teacher-classroom"><i class="bi bi-basket fa-fw me-2"></i>My Classroom</a>

                                        <a class="list-group-item " href="#"><i class="bi bi-people fa-fw me-2"></i>Students</a>

                                        <a class="list-group-item" href="/trainer-review"><i class="bi bi-star fa-fw me-2"></i>Reviews</a>
                                        <!-- <a class="list-group-item" href="#"><i class="bi bi-pencil-square fa-fw me-2"></i>Edit Profile</a> -->

                                        <a class="list-group-item text-danger bg-danger-soft-hover" href="/user-signout"><i class="fas fa-sign-out-alt fa-fw me-2"></i>Sign Out</a>
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
                            <h3 class="mb-0">My Classroom List</h3>
                        </div>
                        <tbody>
                            <tr>
                                <!-- Course item -->
                                <td>
                                    <div class="d-flex align-items-center">
                                        <!-- Image -->
                                        <div class="w-100px">
                                            <img src="assets/images/courses/4by3/10.jpg" class="rounded" alt="">
                                        </div>
                                        <div class="mb-0 ms-2">
                                            <!-- Title -->
                                            <h6><a href="#">Bootstrap 5 From Scratch</a></h6>
                                            <!-- Info -->
                                            <div class="d-sm-flex">
                                                <p class="h6 fw-light mb-0 small me-3"><i class="fas fa-table text-orange me-2"></i>0 lectures</p>
                                                <p class="h6 fw-light mb-0 small"><i class="fas fa-check-circle text-success me-2"></i>0 Completed</p>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="badge bg-secondary bg-opacity-10 text-secondary">Disable</div>
                                </td>
                            </tr>
                        </tbody>
                    </div>
                    <!-- Card END -->
                </div>
</main>
</section>
<!-- Main content END -->
</div><!-- Row END -->
</div>