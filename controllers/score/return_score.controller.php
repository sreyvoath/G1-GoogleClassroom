<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    if (isset($_POST['score'])) {
        echo $_POST['score'];
    }

    // header("Location: /student_work?id=$id");
}

