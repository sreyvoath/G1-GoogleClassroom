<?php

require_once '../../database/database.php';
require_once('../../models/class.model.php');
session_start();
// ========== get post value ======
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $section = $_POST['section'];
    $subject = $_POST['subject'];
    $archive = 1;
    $user_id = $_SESSION['user']['id'];
    $image = $_FILES['image'];

    // =======check value  and upload image to database ========
    if (!empty($title) && !empty($section) && !empty($subject) && !empty($image)) {
        $directory = "../../assets/images/classes/";
        $target_file = $directory . basename($_FILES['image']['name']);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        $checkImageSize = getimagesize($_FILES["image"]["tmp_name"]);

        if ($checkImageSize) {
            if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
                $_SESSION['error'] = "Wrong Image extension!";
                header('Location: /home');
                exit;
            } 
            else {
                $imageExtension = $imageFileType;
                $newFileName = uniqid();
                $nameInDirectory = $directory . $newFileName . '.' . $imageExtension;
                $nameInDB = $newFileName . '.' . $imageExtension;
                move_uploaded_file($_FILES["image"]["tmp_name"], $nameInDirectory);
                $code = substr(str_shuffle(str_repeat("0123456789abcdefghijklmnopqrstuvwxyz", 5)), 0, 7);
                createClass($title,  $section,  $subject, $user_id, $nameInDB, $code);

                header('Location: /home');
                exit;
            }
        }
    }
    else {
        echo "<script>alert('You must complete all fields.');</script>";
        header('refresh:0; url=/home');
    }
}
