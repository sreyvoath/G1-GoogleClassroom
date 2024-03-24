<?php
require "../../database/database.php";
require "../../models/class.model.php";

// ========== get value by post ========
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['classname'];
    $section = $_POST['section'];
    $subject = $_POST['subject'];
    $id = $_POST['id'];
    $image = $_FILES['image'];

    // ============= check value update ==============
    if (!empty($title) && !empty($section) && !empty($subject) && !empty($id)) {
        if (!empty($image['name'])) {
            $directory = "../../assets/images/classes/";
            $target_file = $directory . basename($_FILES['image']['name']);
            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

            if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
                $_SESSION['error'] = "Wrong Image extension!";
                header('Location: views/profiles/edit_profile.view.php');
                exit();
            }

            $newFileName = uniqid();
            $nameInDirectory = $directory . $newFileName . '.' . $imageFileType;
            $nameInDB = $newFileName . '.' . $imageFileType;
            move_uploaded_file($_FILES["image"]["tmp_name"], $nameInDirectory);
            updateClass($title, $section, $subject, $id, $nameInDB);
        } else {
            updateExistClass($title, $section, $subject, $id);
        }
        header('Location: /home');
        exit();
    } else {
        $_SESSION['profile_err'] = "Please Enter all fields";
        header('Location: ../../views/profiles/edit_profile.view.php');
        exit();
    }
}
