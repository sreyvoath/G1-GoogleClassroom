<?php
session_start();
require "../../database/database.php";
require "../../models/user_join_class/class.model.php";
require "../../models/invites/invite.model.php";


if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $messge = getMessage($id);
    
    $teacherId = $messge['user_id'];
    $classId = $messge['class_id'];
    createUserJoinClass($teacherId, $classId);
    deleteMessage($id);
    header("location:/home");
} else {
    header("location:/message");
}
