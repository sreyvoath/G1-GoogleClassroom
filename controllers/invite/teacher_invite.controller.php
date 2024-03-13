<?php
session_start();
require_once '../../database/database.php';
require_once('../../models/user_join_class/student.model.php');
require_once('../../models/user_join_class/class.model.php');
require_once('../../models/invites/invite.model.php');
$classId = $_SESSION['class_id'];
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['email'])) {
        $email =  htmlspecialchars($_POST['email']);
        $checkEmail = checkEmailUser($email);
        if (count($checkEmail) > 0) {
            if ($checkEmail['role'] == 'teacher') {

                $checkEmailExits = checkEmailUserExits($checkEmail['id'], $classId);

                if (count($checkEmailExits) > 0) {
                    $_SESSION['err_exist_join'] = "This user already joined!";
                    header("location:/people");
                }
                if($email != $_SESSION['user_created']['email']){
                    createMessage("Invited you", $checkEmail['id'], $classId, $_SESSION['user']['id']);
                    header("Location: /people?id=$classId");
                    exit;
                }
                else{
                    $_SESSION['err_owner'] = "You cannot invite owner";
                    header("Location: /people?id=$classId");
                    exit;
                }
                if (count($checkEmail) > 0 and count($checkEmailExits) == 0 ) {
                    createMessage("Invited you", $checkEmail['id'], $classId, $_SESSION['user']['id']);
                }
            } else {
                $_SESSION['err-not_here'] = "You cannot invite student here";
                
            }
        } else {
            $_SESSION['err_notfound'] = "User not found";
        }
    } else {
        $_SESSION['err-fill'] = "You must complete all feild";
    }
    header("Location: /people?id=$classId");
}
