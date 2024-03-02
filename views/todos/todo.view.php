<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div class="container mt-3">
        <form action="" class="bg-body shadow">
            <div class="row ">
                <div class="nav-todo d-flex mt-2 p-2" style="width:97%; margin:auto;">
                    <a href="/todo" class="mx-3" style="width: 100px; height:30px;">Assigned</a>
                    <a href="/missing" class="mx-3" style="width: 100px; height:30px;">Missing</a>
                    <a href="/done" class="mx-3" style="width: 100px; height:30px;">Done</a>
                </div>
                <hr style="width: 97%;margin:auto;">
                <div class="class">
                    <button class="d-flex justify-content-between align-items-center bg-purple text-white btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false" style="width:150px; height:40px;border:none;margin:40px 0 30px 60px ;">
                        <strong> All Class</strong>
                    </button>
                    <ul class="dropdown-menu"> ...
                    </ul>
                </div>

                <!-- list-assignment -->
                <div class="dropdown-submenu dropend shadow-sm mb-5 bg-body rounded px-4 py-2 d-flex justify-content-between border-start border-5 border-primary" style="width:90%; margin:auto;">
                    <div class="left d-flex gap-3">
                        <div class="circle bg-info col-1 text-center" style="width: 50px; border-radius: 50px;">
                            <span class="material-symbols-outlined fs-2 text-white pt-2">assignment</span>
                        </div>
                        <div class="title mt-3">
                            <h6><a href="#">name assignment</a></h6>
                        </div>
                    </div>
                    <div class="dropdown mt-2 d-flex">
                        <a class="nav-link" href="#" id="pagesMenu" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <span class="material-symbols-outlined">more_vert</span></a>
                        <ul class="dropdown-menu" aria-labelledby="accounntMenu">
                            <li class="dropdown-submenu dropend">
                                <a class="dropdown-item " href="#">Edit</a>
                            </li>
                            <li class="dropdown-submenu dropend">
                                <a class="dropdown-item " href="# ">Delete</a>
                            </li>
                            <li class="dropdown-submenu dropend">
                                <a class="dropdown-item " href="# ">Copy Link</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </form>
    </div>
</body>

</html>