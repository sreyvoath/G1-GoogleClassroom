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
                                <h6><a href="#">this is account gmail</a></h6>
                            </div>
                        </div>
                        <!-- Buttons -->
                    </div>
                </td>
            </tr>

        </tbody>
    </table>
    <style>
        .form-select {
            width: 500px;
        }
    </style>
    <select id="filterSelect" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
        <option value="0" selected>All</option>
        <option value="1">Turned in</option>
        <option value="2">Returned</option>
        <option value="3">Missing</option>
    </select>
    <!-- ------------------------------------------------------------- -->
    <div class="accordion" id="accordionExample">
        <div class="accordion-item">
            <div data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                <div class="d-flex align-items-center justify-content-between shadow-sm mb-3 bg-body rounded px-4 py-4 border-start border-primary">
                    <div class="d-flex align-items-center">
                        <h6>scrum lop hery</h6>  
                    </div>
                    <h6>ka</h6>
                </div>
            </div>

            <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                <div class="d-flex align-items-center justify-content-between shadow-sm mb-3 bg-body rounded px-4 py-4 border-start border-primary">
                    <div class="d-flex align-items-center">
                        <div class="w-70px me-2">
                            ewyuio
                        </div>
                        <p>reaction</p>
                    </div>
                </div>
                <div class="d-flex align-items-center justify-content-between shadow-sm mb-3 bg-body rounded px-4 py-4 border-start border-primary">
                    <div class="d-flex align-items-center">
                        <div class="w-70px me-2">
                            ewyuio
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>





    <!-- -------------------------------------------------------------- -->







</div>