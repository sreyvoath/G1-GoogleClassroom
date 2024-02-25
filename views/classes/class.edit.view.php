<?php

require "../../layouts/header.php";
?>
<div class="container mt-5">
    <div class="row">
        <div class="col-3"></div>
        <div class="col-5">
            <div class="card mt-6">
                <h3 class="modal-title" id="exampleModalLabel"> <i class="bi bi-pencil-square mx-3 text-info fs-2"></i>Update Class</h3>
                <div class="card-body">
                    <form method="POST" action="../../controllers/classes/class.update.controller.php">
                        <input type="hidden" id="id" name="id" value="<?= $class['id'] ?>">
                        <div class="mb-3">
                            <label for="classname" class="form-label">Class Name*</label>
                            <input type="text" class="form-control" name="classname" id="classname" required placeholder="Enter a Name" value="<?= $class['title'] ?>">
                        </div>

                        <div class="mb-3">
                            <label for="section" class="form-label">Section*</label>
                            <input type="text" class="form-control" name="section" id="section" required placeholder="Enter a section" value="<?= $class['section'] ?>">
                        </div>

                        <div class="mb-3">
                            <label for="subject" class="form-label">Subject*</label>
                            <input type="text" class="form-control" name="subject" id="subject" required placeholder="Enter a subject" value="<?= $class['subject'] ?>">
                        </div>

                        <div class="mb-3">
                            <label for="category" class="form-label">Category*</label>
                            <select class="form-select" name="category" id="category" required>
                                <option value="Information Technoloy">Information Technoloy</option>
                                <option value="Professional Life">Professional Life</option>
                                <option value="English">English</option>
                            </select>
                        </div>
                        <!-- Button -->
                        <div class="align-items-center mt-0">
                            <div class="d-grid d-flex justify-content-end ">
                                <a href="/home" class="me-3 btn border-secondary btn-outline-danger mb-0" type="button">Cancel</a>
                                <button type="submit" class="btn btn-primary mb-0" type="button">Update</button>
                            </div>
                        </div>

                    </form>
                </div>
                <div class="col-3"></div>
            </div>
        </div>

    </div>
</div>