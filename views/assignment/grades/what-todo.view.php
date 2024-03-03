<div class="container">

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
                            <div class="avatar avatar-xxl mt-n3">
                                <img class="avatar-img rounded-circle border border-white border-5 shadow" src="../../assets/images/profiles/<?= $_SESSION['user']['image'] ?>" alt="">
                            </div>

                            <div class="mb-0 ms-2">
                                <!-- Title -->
                                <h6><?= $_SESSION['user']['name'] ?></h6>
                            </div>
                        </div>
                        <!-- Buttons -->
                    </div>
                </td>
            </tr>

        </tbody>
    </table>
    <style>
    </style>
    <select id="filterSelect" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
        <option value="0" selected>All</option>
        <option value="1">Turned in</option>
        <option value="2">Returned</option>
        <option value="3">Missing</option>
    </select>

    <!-- ----for display when select option all--------------------------------------------------------- -->
    <div class="accordion accordion-flush" id="accordionFlushExample">
        <div class="accordion-item">
            <div data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                <div class="d-flex align-items-center justify-content-between shadow-sm mb-1 bg-body rounded px-4 py-2 border-start border-primary">
                    <div class=" align-items-center">
                        <p>name(homework)</p>
                        <p>No due date</p>
                    </div>
                    <h6>Assigned</h6>
                </div>
            </div>
            <div id="flush-collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                <div class="d-flex align-items-center justify-content-between shadow-sm mb-1 bg-body rounded px-4 py-3 border-start border-primary">
                    <div class=" align-items-center">
                        <p>No work has been attached</p>
                    </div>
                </div>
                <div class="d-flex align-items-center justify-content-between shadow-sm mb-1 bg-body rounded px-4 py-3 border-start border-primary">
                    <div class="d-flex align-items-center">
                        <div class="align-items-center">
                            <button type="button" class="btn btn-light"><a href="#">View instructions</a></button>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- -------to do for display when select returned------------------------------------------------------- -->


</div>

