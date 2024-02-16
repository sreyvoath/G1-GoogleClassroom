<?php
require  "./layouts/header.php";
?>

<div class="container w-50 p-5 mt-5" style="background-color: #eee;">
    <h3 class="title mb-5">Create Class</h3>
    <form action="" method="post">
        <div class="mb-3 col-12 g-3">
            <input type="text" name="class_name" class="form-control" id="name" placeholder="class name">
        </div>
        <div class="mb-3 col-12 g-3">
            <input type="text" name="section" class="form-control" id="section" placeholder="section">
        </div>
        <div class="mb-3 col-12 g-3">
            <input type="text" name="subject" class="form-control" id="subject" placeholder="subject">
        </div>
        <div class="mb-3 col-12 g-3">
            <input type="text" name="room" class="form-control" id="room" placeholder="room">
        </div>
        <div class="d-grid gap-2 mt-3 d-md-flex justify-content-md-end ">
            <button type="button" class="btn btn-light mr-5"><a href="/views/home/home.view.php">Cancell</a></button>
            <button type="button" class="btn btn-light"><a href="card_class.view.php">Create</a></button>
        </div>
    </form>
</div>