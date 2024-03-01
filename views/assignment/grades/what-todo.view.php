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
    <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
        <option selected class="mg-3">All</option>
        <option value="1">Turned in</option>
        <option value="2">Returned</option>
        <option value="3">Missing</option>
    </select>
    <div class="dropdown ms-3">
        <a class="nav-link" href="#" id="pagesMenu" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Action
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
    <table class="table">
        <tbody>
            <tr>
                <td class=''><h6 class="mr-4">Mark</h6></td>
                <td class=''><h6>Mark</h6></</td>
            </tr>
            <tr>
                
                <td >Jacob</td>
                <td class='pd-5'>Jacob</td>
    
            </tr>
            <tr>
                <th scope="row">3</th>
                <td>Larry</td>
            </tr>
        </tbody>
    </table>


</div>