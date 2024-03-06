<?php
session_start();
require "../../database/database.php";
require "../../models/user_join_class/class.model.php";
require "../../models/invites/invite.model.php";

if(isset($_GET['id']) and isset($_SESSION['1user_id']) and isset($_SESSION['1class_id'])){
    $id = $_GET['id'];
    $student_id = $_SESSION['1user_id'];
    $classId = $_SESSION['1class_id'];
    createUserJoinClass($student_id, $classId);
    deleteMessage($id);
    header("location:/home");

}
else {
    header("location:/message");
}


?>