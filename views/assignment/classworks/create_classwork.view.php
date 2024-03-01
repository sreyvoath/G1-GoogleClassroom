<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>create</title>
</head>

<body>
    <div class="container">

        <form action="controllers/assignment/create_assignment.controller.php" method="post">
            <button type="submit" class="btn btn-purple float-end" style="width: 100px; margin-top:-50px;">Assign</button>
            <div class="row mt-5">
                <div class="col-8">
                    <div class="assignment border boder-light rounded p-5 bg-body shadow" style=" height:100%;">
                        <h3 class="assignment-title text-center mb-3" style="margin-top: -20px;">Assignment</h3>
                        <div class="mb-3">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" name="title" class="form-control bg-light" id="title" aria-describedby="emailHelp" placeholder="Title">
                        </div>
                        <div class="mb-3 ">
                            <label for="intro" class="form-label">Introduction (optional)</label>
                            <textarea name="content" class="form-control bg-light" id="intro" id="" cols="30" rows="10" style=" height:100px;"></textarea>
                        </div>
                        <div class="mb-3 mt-2">
                            <label for="intro" class="form-label">Upload file</label>
                            <input type="file" name="document" class="form-control bg-light" style="width: 100%;">
                        </div>
                    </div>
                </div>
                <div class="info col-4">
                    <div class="assignment border boder-light rounded p-5 bg-body shadow" style=" height:100%;">

                        <div class="col-4">
                            <div class="btn-for">
                                <label for="intro" class="form-label mt-4">For</label>
                                <div class="btn-group d-flex justify-content-between" style="gap:20px;">
                                    <div class="btn-group">
                                        <button class="bg-light btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false" style="width:120px; height:40px; border:none;">
                                            List-class
                                        </button>
                                        <ul class="dropdown-menu">
                                            ...
                                        </ul>
                                    </div>
                                    <div class="btn-group">
                                        <button class="bg-light btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false" style="width:120px; height:40px;border:none;">
                                            All Students
                                        </button>
                                        <ul class="dropdown-menu">
                                            ...
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- point -->
                            <div class="btn-point d-flex flex-column mt-4">
                                <label for="title" class="form-label">Point</label>
                                <input type="number" name="score" class="bg-light text-center" style="width:120px; height:40px;border:none;" placeholder="score">
                            </div>
                            <!-- date -->
                            <div class="btn-date mt-5">
                                <label for="date" class="form-label mt-3">Due</label>
                                <input type="date" id="date" name="end_date" class="form-control" style="width: 250px;">
                            </div>
                            <div class="btn-date mt-5">
                                <label for="date" class="form-label mt-3">Time</label>
                                <input type="time" id="date" name="end_time" class="form-control" style="width: 250px;">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</body>

</html>