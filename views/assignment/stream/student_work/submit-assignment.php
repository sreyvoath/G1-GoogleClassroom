<?php
require "database/database.php";
require "models/assignments/assignment.model.php";
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $_SESSION['assign_id'] = $id;
    $assignment = getAssign($id);
}
?>
<div class="d-flex">
    <h4 class="ms-3">Homework</h4>
</div>

<div class=" card-body rounded " style=" margin-top: -70px;">
    <div class="p-5">
        <span class="d-inline-block" style="height: auto; width: 30%;">
            <div class="d-flex border align_items-center" style=" margin-left: -50px;">
                <div class="avatar avatar-sd ">
                    <img class="avatar-img rounded-circle border border-white border-5 shadow" src="../../assets/images/profiles/<?= $_SESSION['user']['image'] ?>" alt="">
                </div>
                <div class=" mt-2 ms-2 ">
                    <?= $_SESSION['user']['name'] ?>

                </div>
                <div class="mt-2" style="margin-left: 120px;">
                    <p style="color: green;">Turned in</p>
                </div>
                <div class="dropdown mt-1 ms-5 d-flex" >
                    <a class="nav-link dropdown-toggl" href="#" id="pagesMenu" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="material-symbols-outlined">arrow_drop_down</span></a>
                    <div class="dropdown-menu" aria-labelledby="accounntMenu">
                        <div class="dropdown-submenu dropend">
                            <div class="dropdown-item " href="#">Edit</div>
                        </div>
                        <div class="dropdown-submenu dropend" >
                            <div class="dropdown-item" style=" width: 100%;" >Delete</div>
                        </div>
                    </div>
                </div>
            </div>
        </span>
        <span class="material-symbols-outlined ms-8">arrow_back_ios</span>
        <span class="material-symbols-outlined">arrow_forward_ios</span>
    </div>

    <main class="d-flex " style="width: 100%;">
        <section class=" border" style="width: 70%; ">
            <div class="container">
                <span class="d-inline-block" style="height: auto; width: 400px;">
                    <div class="d-flex" style="border-radius: 10px; margin-left: -40px;">

                    </div>
                </span>
        </section>
        <!-- =============================================================================================== -->
        <div class=" ms-1" style="width: 30%;">
            <div class="border d-flex">
                <div class="left border p-2">
                    <div class="on mt-4" style="display: flex;flex-direction: column;">
                        <span class="material-symbols-outlined">grading</span>
                        <span class="material-symbols-outlined mt-2">comment_bank</span>
                    </div>

                    <div class="under" style="margin-top: 150px;display: flex;flex-direction: column;">
                        <span class="material-symbols-outlined">help</span>
                        <span class="material-symbols-outlined mt-2">arrow_forward_ios</span>
                    </div>
                </div>
                <div class="card-body">
                    <h5 class="card-title">Files</h5>
                    <p class="card-text">Turned in on Mar 18, 9:35 AM</p>
                    <a href="#">
                        <p class="card-text">See history</p>
                    </a>
                    <span class="d-inline-block d-flex" style="height: auto; width: 100%;">
                        <div class="d-flex border align_items-center p-2">
                            <img class="avatar-img border border-white border-5 shadow" src="../../assets/images/profiles/Pdf-2127829.png" alt="" style="width:30px;height:30px">
                            <p style="font-size: 15px;">get job information.-------</p>
                        </div>
                        <div class="open-new border d-flex align-items-center justify-content-center" style="height: auto; width: 20%;">
                            <span class="material-symbols-outlined" style="font-size: 30px;">open_in_new</span>
                        </div>
                    </span>
                    <hr>
                    <h5>Private comments</h5>
                    <input type="text" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm">
                    <div class="btn" style=" margin-left: 225px;">
                        <button class="btn btn-primary mt-2" type="submit">Post</button>
                    </div>

                </div>
            </div>
            <div>
    </main>