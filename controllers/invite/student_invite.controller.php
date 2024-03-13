<?php
session_start();
require_once '../../database/database.php';
require_once('../../models/user_join_class/student.model.php');
require_once('../../models/user_join_class/class.model.php');
require_once('../../models/invites/invite.model.php');

$classId = $_SESSION['class_id'];
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (!empty($_POST['email'])) {
        $email = htmlspecialchars($_POST['email']);
        $checkEmail = checkEmailUser($email);
        if (count($checkEmail) > 0) {
            $id = $checkEmail['id'];
            $checkEmailExits = checkEmailUserExits($id, $classId);
            if (count($checkEmailExits) > 0) {
                $_SESSION['err_exist_join'] = "This user already joined!";
                header("location:/people");
            }
            if (count($checkEmail) > 0 and count($checkEmailExits) == 0) {
                createMessage("Invited you", $id, $classId, $_SESSION['user']['id']);
                
            }
        } else {
            $_SESSION['err_not_found']= "User not found";
        }
    }
    header("Location: /people?id=$classId");
}
