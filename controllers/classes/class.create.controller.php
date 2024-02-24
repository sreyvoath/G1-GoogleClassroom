<?php
require_once '../../database/database.php';
require_once('../../models/class.model.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $section = $_POST['section'];
    $subject = $_POST['subject'];
    $archive = 1;
    $user_id = 3;
    $category_id = 1;
    $image = $_FILES['image'];

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
            } else {
                $imageExtension = $imageFileType;
                $newFileName = uniqid();
                $nameInDirectory = $directory . $newFileName . '.' . $imageExtension;
                $nameInDB = $newFileName . '.' . $imageExtension;
                move_uploaded_file($_FILES["image"]["tmp_name"], $nameInDirectory);
                createClass($title,  $section,  $subject, $user_id,  $category_id, $nameInDB);
                header('Location: /home');
                exit;
            }
        }
    }
}
