<main>
    <div class="container">
        <div class="row mb-5 align-items-center ">
            <!-- Search bar -->
            <script src="../../js/main.js"></script>
            <ul class="nav nav-pills nav-pills-bg-soft justify-content-sm-center mb-4 px-3" id="course-pills-tab" role="tablist">
                <div class="btn-toolbar align-items-center justify-content-evenly" role="toolbar" aria-label="Toolbar with button groups">
                    <div class="btn-group me-4" role="group" aria-label="First group">
                        <a href="/stream?id=<?=$_SESSION['class_id']?>"><button type="button" class="btn btn-outline-primary <?= urlIs("/stream") ? "active" : "" ?> ">Stream</button></a>
                    </div>
                    <div class="btn-group me-4" role="group" aria-label="Second group">
                        <a href="/classwork"><button type="button" class="btn btn-outline-info <?= urlIs("/classwork") ? "active" : "" ?> ">Classwork</button></a>
                    </div>
                    <div class="btn-group me-4" role="group" aria-label="Second group">
                        <a href="/people"><button type="button" class="btn btn-outline-secondary <?= urlIs("/people") ? "active" : "" ?> ">Poeple</button></a>
                    </div>
                    <div class="btn-group me-4" role="group" aria-label="Third group">
                        <a href="/point"><button type="button" class="btn btn-outline-success <?= urlIs("/point") ? "active" : "" ?> ">Grades</button></a>
                    </div>
                </div>
            </ul>
        </div>
    </div>
    <section class="pt-0">
        <div class="container">
            <div class="row">
                <!-- Right sidebar START -->
                <div class="col-xl-12">
                    <!-- Card START -->
                    <div class="card border rounded-3">
                        <!-- Card header START -->
                        <div class="card-header border-bottom bg-purple text-white  d-flex text-align-center justify-content-between">
                            <h2 class="mb-0 text-white">Teachers</h2>

                            <div class="invite" data-bs-toggle="modal" data-bs-target="#inputTag">
                                <span class="material-symbols-outlined" style="font-size: 30px;">group_add</span>
                            </div>

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
                                                        <img class="avatar-img rounded-circle border border-white border-5 shadow" src="../../assets/images/profiles/<?= $_SESSION['user']['image'] ?>" alt="">
                                                    </div>

                                                    <div class="mb-0 ms-2">
                                                        <!-- Title -->
                                                        <h6><a href="#">this is account gmail</a></h6>
                                                    </div>
                                                </div>
                                                <!-- Buttons -->
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <!-- Course item -->
                                        <td>
                                            <div class="d-flex align-items-center justify-content-between">
                                                <!-- Content -->
                                                <div class="d-flex align-items-center">
                                                    <!-- Image -->
                                                    <div class="avatar avatar-lg mt-n3">
                                                        <img class="avatar-img rounded-circle border border-white border-5 shadow" src="../../assets/images/profiles/65d87ca82c6d7.jpg" alt="">
                                                    </div>

                                                    <div class="mb-0 ms-2">
                                                        <!-- Title -->
                                                        <h6><a href="#">orther invite</a></h6>
                                                    </div>
                                                </div>
                                                <!-- Buttons -->
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
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                                <!-- PHP loop for classes END -->
                            </table>


                        </div>
                    </div>
                    <div class="card border rounded-3 mt-5">
                        <!-- Card header START -->
                        <div class="card-header border-bottom bg-purple text-white  d-flex text-align-center justify-content-between">
                            <h2 class="mb-0 text-white">Students</h2>
                            <div>
                                <span class="material-symbols-outlined" style="font-size: 30px;">group_add</span>
                            </div>

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
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                                    </div>
                                                    <div class="dropdown ms-3">
                                                        <a class="nav-link" href="#" id="pagesMenu" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                Action
                                                            </button>
                                                        </a>
                                                        <ul class="dropdown-menu" aria-labelledby="accounntMenu">
                                                            <li class="dropdown-submenu dropend">
                                                                <h5><a class="dropdown-item " href="#">Email</a></h5>
                                                            </li>
                                                            <li class="dropdown-submenu dropend">
                                                                <h5><a class="dropdown-item " href="#">Remove</a></h5>
                                                            </li>
                                                        </ul>
                                                    </div>

                                                    <div class="mb-0 ms-2">

                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <!-- Course item -->
                                        <td>
                                            <div class="d-flex align-items-center justify-content-between">
                                                <!-- Content -->
                                                <div class="d-flex align-items-center">
                                                    <!-- Image -->
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                                    </div>
                                                    <div class="avatar avatar-lg mt-n3 ms-3">
                                                        <img class="avatar-img rounded-circle border border-white border-5 shadow" src="../../assets/images/profiles/65dde7678ee7e.jpg" alt="">
                                                    </div>

                                                    <div class="mb-0 ms-2">
                                                        <!-- Title -->
                                                        <h6><a href="#">this is add account gmail student</a></h6>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <!-- Course item -->
                                        <td>
                                            <div class="d-flex align-items-center justify-content-between">
                                                <!-- Content -->
                                                <div class="d-flex align-items-center">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                                    </div>
                                                    <div class="avatar avatar-lg mt-n3 ms-3">
                                                        <img class="avatar-img rounded-circle border border-white border-5 shadow" src="../../assets/images/profiles/65d6da1f32905.jpg" alt="">
                                                    </div>

                                                    <div class="mb-0 ms-2">
                                                        <!-- Title -->
                                                        <h6><a href="#">this is account gmail(other acc)</a></h6>
                                                        <!-- Info -->
                                                    </div>
                                                </div>
                                                <!-- Buttons -->
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
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                                <!-- PHP loop for classes END -->
                            </table>
                        </div>
                    </div>

                </div>
            </div>
    </section>
</main>


<!-- input tag box -->
<div class="modal fade" id="inputTag" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"> invite teacher</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="myForm" action="controllers/classes/class.create.controller.php" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <input type="email" class="form-control" id="email" placeholder="Type a name or email" name="email">
                    </div>
                </form>
            </div>
            
            <div class="modal-footer">
                <p>welcome to invite people</p>
            </div>
        </div>
    </div>
</div>