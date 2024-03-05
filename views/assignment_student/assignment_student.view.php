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
                                <div class="d-flex">
                                    <!-- Image -->
                                    <div class="w-100px " style="margin-right: -13px;">
                                        <img src="assets/images/about/download (2).png" class="rounded" alt="">
                                    </div>
                                    <div class="mb-0 ms-2 mt-2">
                                        <!-- Title -->
                                        <h3><a href="/instruction">DATABASE FINAL EXAM</a></h3>
                                        <!-- Info -->
                                        <p class="h6 fw-light mb-0 small me-3">Him HEY Jan 25 (Edited Jan 25)</p>
                                        <br>
                                        <div class="d-flex justify-content-between align-items-center " style="width: 250%;">
                                            <div>
                                                <p class="h6 fw-light mb-0 small"> 100 Points</p>
                                            </div>
                                            <div>
                                                <h5>Due Jan 25, 11:00 AM</h5>
                                            </div>

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

            <div class="card mb-3" style="max-width: 540px;">
                <div class="row g-0 border border-primary rounded ">
                    <div class="col-md-4 border border-primary justify-content-center align-items-sm-center d-flex ">
                        <img src="assets/images/about/download.png" class="img-fluid rounded-start" alt="..." style="width: 80px;">
                    </div>
                    <div class="col-md-8 border border-primary ">
                        <div class="card-body text-center">
                            <h5 class="card-title">Card title</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div class="mb-0 ms-8">
            <p><i class="fas fa-user-graduate me-3"></i>Class comments</p>
        </div>

        <div class="ms-7 d-flex flex-row">
            <div class="avatar avatar-xl mt-3 d-flex justify-content-center align-items-center">
                <img class="avatar-lg rounded-circle border border-white border-1 shadow" src="../../assets/images/profiles/<?= $_SESSION['user']['image'] ?>" alt="avatar">
            </div>

            <div class="border ms-4 rounded" style="width: 1000px; height:120px;">
                <div class="">
                    <nav class="navbar">
                        <div class="container-fluid ">
                            <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
                                <input type="text" class="form-control" name="classname" id="classname" required placeholder="Add class comment">
                            </button>
                        </div>
                    </nav>
                    <div class="collapse" id="navbarToggleExternalContent">
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
    </section>

    <!-- =============================================================================================== -->
    <div class="container " style="width: 30%;">
        <div class="p-3 mb-2 rounded shadow-sm p-3 mb-5 bg-body rounded ">
            <div class="card-body d-flex justify-content-between ">
                <h5 class="card-title">Your work</h5>
                <p class="card-text">Turned in</p>
            </div>
            <div class="card-body rounded">
                <div class="d-flex ">
                    <div class="d-flex rounded border border-primary">
                        <div class="flex-shrink-0 border border-primary">
                            <img src="assets/images/about/download.png" alt="..." style="width: 50px;">
                        </div>
                        <div class="flex-grow-1 ms-0 border border-primary">
                            This is some content from a media component.
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body ">
                <button type="button" class="btn btn-primary" style="width: 100%;">Unsubmit</button>
            </div>
            <div class="card-body text-center">
                <p>Your teacher is not accepting work at this time</p>
            </div>

        </div>

        <div class="p-3 mb-2 rounded shadow-sm p-3 mb-5 bg-body rounded">
            <div class="mb-0 ms-3 ">
                <p><i class="fas fa-user-graduate me-3"></i>Private comments</p>
                <div class="me-3 ">
                    <nav class="navbar">
                        <div class="container-fluid ">
                            <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#private" aria-controls="private" aria-expanded="false" aria-label="Toggle navigation">
                                <input type="text" class="form-control" name="classname" id="classname" required placeholder="Add private comment">
                            </button>
                        </div>
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