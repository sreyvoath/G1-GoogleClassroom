<?php
require_once '../../database/database.php';
require_once('../../models/class.model.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $section = $_POST['section'];
    $subject = $_POST['subject'];
    $user_id = 3;
    $archive = 1;
    $category_id = 2;
    $image = $_FILES['image'];
    // var_dump($image);g

    if (!empty($_POST['title']) and !empty($_POST['section'])  and !empty($_POST['subject']) and !empty($_POST['user_id']) and !empty($_POST['archive']) and !empty($_POST['category_id']) and !empty($image)) {
        $directory = "../../assets/images/classes/";
        $target_file = $directory . '.' . basename($_FILES['image']['name']);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        $checkImageSize = getimagesize($_FILES["image"]["tmp_name"]);
        if ($checkImageSize) {
            if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
                $_SESSION['error'] = "Wrong Image extension!";
                header('Location: /home');
            } else {
                $imageExtension = explode('.', $target_file)[5];
                $newFileName = uniqid();
                $nameInDirectory = $directory . $newFileName . '.' . $imageExtension;
                $nameInDB = $newFileName . '.' . $imageExtension;
                var_dump($nameInDB);
                move_uploaded_file($_FILES["image"]["tmp_name"], $nameInDirectory);
                createClass($title,  $section,  $subject,  $user_id,  $archive,  $category_id, $image);
                // header('Location: /home');
                exit;
            }
        }
    }
}
