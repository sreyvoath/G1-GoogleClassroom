<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div class="container mt-3">
        <form action="" class="bg-body shadow " style="height: 100%; padding-bottom:5%;">
            <div class="row ">
                <div class="nav-todo d-flex mt-2 p-2" style="width:97%; margin:auto;">
                    <a href="/todo" class="nav-link mx-3" style="width: 100px; height:30px;">Assigned</a>
                    <a href="/missing" class="nav-link mx-3" style="width: 100px; height:30px;">Missing</a>
                    <a href="/done" class="nav-link mx-3" style="width: 100px; height:30px;">Done</a>
                </div>

                <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                <script>
                    $(document).ready(function() {
                        $('.nav-link').each(function() {
                            if ($(this).attr('href') == window.location.pathname) {
                                $(this).addClass('active');
                            }
                        });
                    });
                </script>

                <style>
                    .active {
                        text-decoration: underline;
                        color: red;
                    }
                </style>

                <hr style="width: 97%;margin:auto;">
                <div class="class">
                    <button class="d-flex justify-content-between align-items-center bg-purple text-white btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false" style="width:150px; height:40px;border:none;margin:40px 0 30px 60px ;">
                        <strong> All Class</strong>
                    </button>
                    <ul class="dropdown-menu"> ...
                    </ul>
                </div>
                <div class="accordion accordion-flush  ms-6 " id="accordionFlushExample" style="width: 90%;">

                    <!-- Done early -->
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-headingThree">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                                This week
                            </button>
                        </h2>
                        <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">
                                <div class="dropdown-submenu dropend shadow-sm mb-5 bg-body rounded px-4 py-2 d-flex justify-content-between border-start border-5 border-primary">
                                    <div class="left d-flex gap-3">
                                        <div class="circle bg-info col-1 text-center" style="width: 50px; border-radius: 50px;">
                                            <span class="material-symbols-outlined fs-2 text-white pt-2">assignment</span>
                                        </div>
                                        <div class="title mt-3">
                                            <h6><a href="#">name assignment</a></h6>
                                        </div>
                                    </div>
                                    <div class="dropdown mt-2 d-flex">
                                        <input type="date" style="border:none;">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-headingThree">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFour" aria-expanded="false" aria-controls="flush-collapseFour">
                                Last week
                            </button>
                        </h2>
                        <div id="flush-collapseFour" class="accordion-collapse collapse" aria-labelledby="flush-headingFour" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">
                                <div class="dropdown-submenu dropend shadow-sm mb-5 bg-body rounded px-4 py-2 d-flex justify-content-between border-start border-5 border-primary">
                                    <div class="left d-flex gap-3">
                                        <div class="circle bg-info col-1 text-center" style="width: 50px; border-radius: 50px;">
                                            <span class="material-symbols-outlined fs-2 text-white pt-2">assignment</span>
                                        </div>
                                        <div class="title mt-3">
                                            <h6><a href="#">name assignment</a></h6>
                                        </div>
                                    </div>
                                    <div class="dropdown mt-2 d-flex">
                                        <input type="date" style="border:none;">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-headingOne">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFive" aria-expanded="false" aria-controls="flush-collapseOne">
                                Earlier
                            </button>
                        </h2>
                        <div id="flush-collapseFive" class="accordion-collapse collapse" aria-labelledby="flush-headingFive" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">
                                <div class="dropdown-submenu dropend shadow-sm mb-5 bg-body rounded px-4 py-2 d-flex justify-content-between border-start border-5 border-primary">
                                    <div class="left d-flex gap-3">
                                        <div class="circle bg-info col-1 text-center" style="width: 50px; border-radius: 50px;">
                                            <span class="material-symbols-outlined fs-2 text-white pt-2">assignment</span>
                                        </div>
                                        <div class="title mt-3">
                                            <h6><a href="#">name assignment</a></h6>
                                        </div>
                                    </div>
                                    <div class="dropdown mt-2 d-flex">
                                        <input type="date" style="border:none;">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </form>
    </div>
</body>

</html>