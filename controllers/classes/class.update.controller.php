<?php
require "../../database/database.php";
require "../../models/class.model.php";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['classname'];
    $section = $_POST['section'];
    $subject = $_POST['subject'];
    $id = $_POST['id'];
    $image = $_FILES['image'];
   
    if (!empty($title) && !empty($section) && !empty($subject) && !empty($id) && !empty($image)) {
        $directory = "../../assets/images/classes/";
        $target_file = $directory . '.' . basename($_FILES['image']['name']);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        $checkImageSize = getimagesize($_FILES["image"]["tmp_name"]);
        if ($checkImageSize) {
            if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
                $_SESSION['error'] = "Wrong Image extension!";
                header('Location: views/profiles/edit_profile.view.php');
            } else {
                $imageExtension = explode('.', $target_file)[6];
                $newFileName = uniqid();
                $nameInDirectory = $directory . $newFileName . '.' . $imageExtension;
                $nameInDB = $newFileName . '.' . $imageExtension;
                move_uploaded_file($_FILES["image"]["tmp_name"], $nameInDirectory);
                updateClass($title, $section, $subject, $id, $nameInDB);
            }
        }

        header('location: /home');
    } else {
        $_SESSION['profile_err'] = "Please Enter all fields";
        header('Location: ../../views/profiles/edit_profile.view.php');
    }
}
