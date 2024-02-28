<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>create</title>
</head>

<body>
    <div class="container">
        <button type="button" class="btn btn-purple float-end" style="width: 100px; margin-top:-50px;">Assign</button>
        <div class="row  mt-5">
            <div class="col-8">
                <form class="border boder-light rounded p-5 bg-body shadow" style=" height:100%;">
                    <h3 class="assignment-title text-center mb-3" style="margin-top: -20px;">Assignment</h3>
                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" name="title" class="form-control bg-light" id="title" aria-describedby="emailHelp" placeholder="Title">
                    </div>
                    <div class="mb-3">
                        <label for="intro" class="form-label">Introduction (optional)</label>
                        <textarea name="introduction" class="form-control bg-light" id="intro" id="" cols="30" rows="10"></textarea>
                    </div>
                    <div class="mb-3">
                        <input type="file" class="form-control bg-light" style="width: 100%;">
                    </div>

                </form>
            </div>
            <div class="info col-4">
                <form class="border boder-light rounded p-5 bg-body shadow" style="height:100%;">
                    <!-- <div class="col-4"> -->
                    <div class="btn-for">
                        <label for="intro" class="form-label">for</label>
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
                                    All Stodents
                                </button>
                                <ul class="dropdown-menu">
                                    ...
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- point -->
                    <div class="btn-point d-flex flex-column">
                        <label for="title" class="form-label mt-3">Point</label>
                        <button class="bg-light btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false" style="width:120px; height:40px;border:none;">100</button>
                    </div>
                    <!-- date -->
                    <div class="btn-date">
                        <label for="date" class="form-label mt-3">Due</label>
                        <div class="dropdown">
                            <button class="bg-light d-flex justify-content-between align-items-center text-center" type="button" style="width:100%; height:40px; border:none;">
                                <span class="selected-date">No date</span>
                                <span class="material-symbols-outlined">
                                    arrow_drop_down
                                </span>
                            </button>
                            <div class="dropdown-menu">
                                <input type="datetime-local" id="date" class="form-control">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
</body>

</html>