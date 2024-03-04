<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
</head>

<body>
    <form action="/controllers/assignment/create_assignment.controller.php" method="post">
        <div class="join-class" style="margin:auto;">
            <div class="back d-flex justify-content-between align-items-center shadow-sm p-3 mb-5 bg-body rounded">
                <div class="nav-left d-flex gap-3">
                    <a class="text-dark" href="/classwork"><span class="material-symbols-outlined">close</span></a>
                    <div class="title d-flex gap-1">
                        <p class="fs-4 mb-1" style="margin-top: -7px;">Join class</p>
                    </div>
                </div>
                <div class="nav-right">
                    <button type="submit" name="" class="btn btn-primary px-4" id="btn-join">Join</button>
                </div>
            </div>
            <div class="d-flex flex-column" style="width:50%;margin:auto; margin-top:-25px;">
                <div class="card " style="height: 35vh;">
                    <div class="card-body">
                        <p class="text">You're currently signed in as</p>
                        <div class="email d-flex ">
                            <img src="../../assets/images/profiles/65d433a6899f9.jpg" class="avatar-img rounded-circle border border-white border-3 shadow" alt="" style="width: 50px; height:50px;">
                            <div class="uerName" style="margin-left: 30px;">
                                <h6>name</h6>
                                <p>user email</p>
                            </div>
                        </div>
                        <p class="switch-account w-25 mt-2 p-2 text-primary" style="border: 1px solid lightgray; border-radius:3px; text-align: center;">Switch account</p>
                    </div>
                </div>
                <div class="card mt-3 " style="height: 35vh;">
                    <div class="card-body">
                        <h5 class="card-title">Class</h5>
                        <p class="card-text">Ask your teacher for the class code,then enter it here</p>
                        <input type="text" name="code" class="form-control w-50 p-3" id="class-code" placeholder="Class code" aria-label="Username" aria-describedby="basic-addon2">
                    </div>
                </div>
                <div class="bottom mt-3" style="margin-left: 30px;">
                    <h6>To sign in with a class code</h6>
                    <ul>
                        <li>Use an authorized account</li>
                        <li>Use a class code with 5-7 letters or numbers, and no spaces or symbols</li>
                    </ul>
                    <p>If you have trouble joining the class, go to the Help Center article</p>
                </div>
            </div>

        </div>
    </form>
</body>

</html>