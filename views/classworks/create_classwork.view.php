<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>create</title>
</head>

<body>
    <div class="container">
        <button type="button" class="btn btn-primary float-end" style="width: 100px; margin-top:-50px;">Assign</button>
        <div class="row  mt-5">
            <div class="col-8">
                <form class="border boder-light rounded p-5 bg-light" style="height:100%;">
                    <h3 class="assignment-title text-center mb-3" style="margin-top: -20px;">Assignment</h3>
                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" name="title" class="form-control" id="title" aria-describedby="emailHelp" placeholder="Title">
                    </div>
                    <div class="mb-3">
                        <label for="intro" class="form-label">Introduction (optional)</label>
                        <input type="text" name="introduction" class="form-control" id="intro" aria-describedby="emailHelp" placeholder="introduction">
                    </div>

                </form>
            </div>
            <div class="info col-4">
                <form class="border boder-light rounded p-5 bg-light" style="height:100%;">
                    <div class="col-4">
                        <label for="intro" class="form-label">for</label>
                        <div class="btn-group d-flex justify-content-between"  style="gap:40px;">
                            <div class="btn-group">
                                <button class="btn btn-secondary btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false" style=" height:40px;">
                                    List-class
                                </button>
                                <ul class="dropdown-menu">
                                    ...
                                </ul>
                            </div>
                            <div class="btn-group">
                                <button class="btn btn-secondary btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false" style="height:40px;">
                                    All Stodents
                                </button>
                                <ul class="dropdown-menu">
                                    ...
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- point -->
                    <div class="col-4">
                        <label for="title" class="form-label">Point</label>

                        <button class="btn btn-secondary btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false" style="height:40px;">
                            100
                        </button>
                    </div>
                    <!-- date -->
                    <div class="col-4 d-flex">
                        <label for="title" class="form-label" style="width: 100%;">Due</label>
                        <button class="btn btn-secondary btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false" style="height:40px;">
                            no date
                        </button>
                    </div>
                </form>
            </div>
        </div>

</body>

</html>