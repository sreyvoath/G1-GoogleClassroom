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

                <div class="col-xl-12 " style="margin-top: -40px;">
                    <!-- Card START -->

                    <div class="nav my-3 my-xl-0 px-4 flex-nowrap align-items-center">
                        <div class="nav-item w-100">
                            <form class="position-relative mt-2 d-flex justify-content-end">
                                <button type="button" class="btn btn-primary text-center" style="border-radius: 50px;" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                <i class="bi bi-plus-lg me-2 "></i>Assignment
                                </button>
                            </form>
                        </div>
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