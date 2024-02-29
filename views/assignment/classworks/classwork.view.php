<main>
    <div class="container">
        <div class="row mb-5 align-items-center ">
            <!-- Search bar -->
            <script src="../../js/main.js"></script>
            <ul class="nav nav-pills nav-pills-bg-soft justify-content-sm-center mb-4 px-3" id="course-pills-tab" role="tablist">
                <div class="btn-toolbar align-items-center justify-content-evenly" role="toolbar" aria-label="Toolbar with button groups">
                    <div class="btn-group me-4" role="group" aria-label="First group">
                        <a href="/stream"><button type="button" class="btn btn-outline-primary">Stream</button></a>
                    </div>
                    <div class="btn-group me-4" role="group" aria-label="Second group">
                        <a href="/classwork"><button type="button" class="btn btn-outline-info ">Classwork</button></a>
                    </div>
                    <div class="btn-group me-4" role="group" aria-label="Second group">
                        <a href="/people"><button type="button" class="btn btn-outline-secondary">Poeple</button></a>
                    </div>
                    <div class="btn-group me-4" role="group" aria-label="Third group">
                        <a href="/point"><button type="button" class="btn btn-outline-success">Grades</button></a>
                    </div>
                </div>
            </ul>
        </div>
    </div>
    <section class="pt-0">
        <div class="container">
            <div class="row">

                <div class="col-xl-12 " style="margin-top: -40px;">
                    <!-- Card START -->

                    <div class="dropdown">
                        <a class="nav-link" href="#" id="pagesMenu" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><button class="btn btn-info"><span class="material-symbols-outlined" style="font-size: 30px;">add </span>Create</button></a>
                        <ul class="dropdown-menu" aria-labelledby="accounntMenu">
                            <li class="dropdown-submenu dropend">
                                <a class="dropdown-item d-flex text-center" href="#" ><span class="material-symbols-outlined"> assignment</span>Assignment</a>
                            </li>
                            <li class="dropdown-submenu dropend">
                                <a class="dropdown-item " href="#">Question</a>
                            </li>
                        </ul>
                    </div>
                    <div class="card border rounded-3">
                        <!-- Card header START -->
                        <div class="card-header border-bottom bg-purple">
                            <h3 class=" text-white mb-0">Assignment</h3>
                        </div>
                    </div>
                    <div class="dropdown-submenu dropend">
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
                                                <div class="d-flex align-items-center w-100">
                                                    <div class="col-8 mb-0 ms-2">
                                                        <!-- Title -->
                                                        <div class="title d-flex gap-3">
                                                            <span class="material-symbols-outlined gap-5">assignment</span>
                                                            <h6><a href="#">Title</a></h6>
                                                        </div>
                                                        <!-- Info -->
                                                        <div class="d-sm-flex">
                                                            <p class="h6 fw-light mb-0 small me-3 mt-2"><i class="fas fa-table text-orange me-2"></i>No due date</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-4 mb-0 text-center">
                                                        <p>post september</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- PHP loop for classes END -->
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
</main>