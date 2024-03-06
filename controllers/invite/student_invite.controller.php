<?php
session_start();
require_once '../../database/database.php';
require_once('../../models/user_join_class/student.model.php');
require_once('../../models/user_join_class/class.model.php');
$classId = $_SESSION['class_id'];
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (!empty($_POST['email'])) {
        $email = htmlspecialchars($_POST['email']);
        $checkEmail = checkEmailUser($email);
        $id = $checkEmail['id'];
        if (count($checkEmail) > 0) {
            createUserJoinClass($id, $classId);
            echo '<script>alert("User joined class successfully");</script>';
        }
    } else {
        // JavaScript alert when email is empty
        echo '<script>alert("You must complete the field");</script>';
        header("location:/people");
    }
}

?>
<!-- Your HTML form here -->

