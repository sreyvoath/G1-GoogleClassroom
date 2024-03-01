<main>
    <div class="container">
        <div class="row mb-5 align-items-center ">
            <!-- Search bar -->
            <script src="../../js/main.js"></script>
            <ul class="nav nav-pills nav-pills-bg-soft justify-content-sm-center mb-4 px-3" id="course-pills-tab" role="tablist">
                <div class="btn-toolbar align-items-center justify-content-evenly" role="toolbar" aria-label="Toolbar with button groups">
                    <div class="btn-group me-4" role="group" aria-label="First group">
                        <a href="/stream?id=<?= $_SESSION['class_id'] ?>"><button type="button" class="btn btn-outline-primary <?= urlIs("/stream") ? "active" : "" ?> ">Stream</button></a>
                    </div>
                    <div class="btn-group me-4" role="group" aria-label="Second group">
                        <a href="/classwork"><button type="button" class="btn btn-outline-info <?= urlIs("/classwork") ? "active" : "" ?> ">Classwork</button></a>
                    </div>
                    <div class="btn-group me-4" role="group" aria-label="Second group">
                        <a href="/people"><button type="button" class="btn btn-outline-secondary <?= urlIs("/people") ? "active" : "" ?> ">Poeple</button></a>
                    </div>
                    <div class="btn-group me-4" role="group" aria-label="Third group">
                        <a href="/grade"><button type="button" class="btn btn-outline-success <?= urlIs("/grade") ? "active" : "" ?> ">Grades</button></a>
                    </div>
                </div>
            </ul>
        </div>
        <table class="table table-bordered">
            <style>
                .table td,
                .table th {
                    padding-left: 20px;
                }

            </style>

            <thead>
                <tr>
                    <th scope="col" class="col-2">
                        <select class="form-select" aria-label="Default select example">
                            <option selected>by last name</option>
                            <option value="1">Sort by first name</option>
                        </select>
                    </th>
                    <th scope="col" class="col-2">
                        <h6>Overall Grades</h6>
                    </th>
                    <th scope="col" class="col-3">
                        <h6>March 01(date)</h6>
                        <a href="#">link to studentwork wrewfdswfdsf....</a>
                        <p>5 out of....</p>
                    </th>
                    <th scope="col" class="col-3">
                        <h6>March 01(date)</h6>
                        <a href="#">link to studentwork wrewfdswfdsf....</a>
                        <p>10 out of....</p>
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row" class="d-flex gap-2">
                        <span class="material-symbols-outlined text-primary">group</span>
                        <h6 class="mt-1">Class averrage</h6>
                    </th>
                    <td>78%</td>
                    <td>20</td>
                    <td>30</td>
                </tr>
                <tr>
                    <th scope="row">
                        <div class="avatar avatar-lg  mt-2">
                            <img class="avatar-img rounded-circle border border-white border-5 shadow" src="../../assets/images/profiles/<?= $_SESSION['user']['image'] ?>" alt="">
                            <a href="/what-todo">Sran cute 💋</a>
                        </div>

                    </th>
                    <td>12</td>
                    <td>..\100</td>
                    <td>@fat</td>
                </tr>
                <tr>
                    <th scope="row">3</th>
                    <td>Larry the Bird</td>
                    <td>@twitter</td>
                    <td>@twitter</td>
                </tr>
            </tbody>
        </table>
    </div>
</main>