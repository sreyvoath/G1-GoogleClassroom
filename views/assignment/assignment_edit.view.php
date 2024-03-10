
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
</head>
<?php session_start() ?>
<body>
    <form action="/controllers/assignment/update_assignment.ontroller.php" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" id="id" value="<?= $assignment['id'] ?>">
        <div class="body">
            <div class="back d-flex justify-content-between align-items-center shadow-sm p-3 mb-5 bg-body rounded">
                <div class="nav-left d-flex gap-3">
                    <a class="text-dark" href="/stream?id=<?= $_SESSION['class_id']?>"><span class="material-symbols-outlined">close</span></a>
                    <div class="title d-flex gap-1">
                        <div class="bg py-1 px-2 d-flex justify-content-enter align-items-center rounded-circle" style=" margin-top: -7px; background-color: purple;">
                            <span class="material-symbols-outlined text-white">description</span>
                        </div>
                        <p class="fs-4 mb-1" style="margin-top: -7px;">Assignment</p>
                    </div>
                </div>
                <div class="nav-right">
                    <button type="submit" class="btn btn-primary px-4">Update Assigned</button>
                </div>

            </div>
            <div class="d-flex m-3">
                <div class="form-left col-8 ">
                    <div class="assignment border boder-light rounded p-5 bg-body shadow" style=" height:100%;">
                        <div class="mb-3">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" name="title" class="form-control " id="title" aria-describedby="emailHelp" value="<?= $assignment['title'] ?>">
                        </div>
                        <div class="mb-3 ">
                            <label for="intro" class="form-label">Introduction (optional)</label>
                            <textarea name="content" class="form-control bg-light" id="intro" id="" cols="30" rows="10" style=" height:100px;"><?= $assignment['content'] ?></textarea>
                        </div>
                        <div class="mb-3 mt-2">
                            <label for="intro" class="form-label">Upload file</label>
                            <input type="file" name="document" class="form-control bg-light" style="width: 100%;" value="<?= $assignment['document'] ?>">
                        </div>
                    </div>
                </div>
                <div class="form-right col-4" style="margin-top: -48px; margin-left: 20px;">
                    <div class="assignment border boder-light rounded p-5 bg-body shadow" style=" height:100%;">
                        <div class="d-flex flex-column">
                            <p style="margin-top: -8px;">For</p>
                            <div class="btn d-flex justify-content-between " style="margin-left: -18px; margin-top: -10px;">

                                <div class="btn-group">
                                    <button class="bg-light btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false" style="width:120px; height:40px;border:none;">
                                        All Classes
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li class="nav-item dropdown d-flex text-center justify-content-center align-items-center">
                                            <input type="checkbox" class="me-2 mb-1">
                                            <div class="bg bg-primary py-1 px-2" style="border-radius: 50px;">
                                                <span class="material-symbols-outlined text-white">group</span>
                                            </div>
                                            <a class="nav-link" href="#">All Students</a>
                                        </li>

                                    </ul>
                                </div>

                                <div class="btn-group">
                                    <button class="bg-light btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false" style="width:120px; height:40px;border:none;">
                                        All Students
                                    </button>
                                    <ul class="dropdown-menu">

                                        <li class="nav-item dropdown">
                                            <a class="nav-link " href="#">list-classes</a>
                                        </li>
                                    </ul>
                                    <ul class="dropdown-menu">
                                        <li class="nav-item dropdown d-flex text-center justify-content-center align-items-center">
                                            <input type="checkbox" class="me-2 mb-1">
                                            <div class="bg bg-primary py-1 px-2" style="border-radius: 50px;">
                                                <span class="material-symbols-outlined text-white">group</span>
                                            </div>
                                            <a class="nav-link" href="#">All students</a>
                                        </li>

                                    </ul>
                                </div>

                            </div>
                            <!-- point -->
                            <div class="btn-point d-flex flex-column mt-4">
                                <label for="title" class="form-label">Point</label>
                                <input type="number" name="score" class="bg-light text-center" style=" width:120px; height:40px;border:none; border-bottom:1px solid gray;" placeholder="score" value="<?= $assignment['score'] ?>">
                            </div>
                            <!-- date -->
                            <div class="btn-date mt-2">
                                <label for="date" class="form-label mt-3">Due</label>
                                <input type="date" id="date" name="end_date" class="form-control" style="width: 250px;" value="<?= $assignment['end_date'] ?>">
                            </div>
                            <!-- time -->
                            <div class="btn-date mt-2">
                                <label for="time" class="form-label mt-3">Time</label>
                                <input type="time" id="date" name="end_time" class="form-control" style="width: 250px;" value="<?= $assignment['end_time'] ?>">
                            </div>
                        </div>
                    </div>
                </div>

            </div>
    </form>
</body>

</html>