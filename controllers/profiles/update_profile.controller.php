<?php
require "../../database/database.php";
require "../../models/user.model.php";
session_start();

// ========= get value by post============
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $image = $_FILES['image'];
    $id = $_POST['id'];

    // ============= check value update ==============
    if (!empty($_FILES['image']) && !empty($_POST['name']) && !empty($_POST['email'])) {
        $directory = "../../assets/images/profiles/";
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
                updateProfile($name, $email, $nameInDB, $id);
                $newUser = getUserEmail($email);
                $_SESSION['user'] = ['name' => $name, 'email' => $email, 'image' => $nameInDB, 'id' => $id, 'role'=>$newUser['role']];
            }
        }
        header('location: /home');
    } else {
        $_SESSION['profile_err'] = "Please Enter all fields";
        header('Location: ../../views/profiles/edit_profile.view.php');
    }
};
