<?php
session_start();
require_once "../../database/database.php";
require_once "../../models/comments/comment.model.php";
date_default_timezone_set('Asia/Phnom_Penh');
if (isset($_POST['classname']) && isset($_POST['classid'])) {
    $_SESSION['classId'] = $_POST['classid'];
    $userId = $_SESSION['user']['id'];
    $classComment = $_POST['classname'];
    $assigmentId = $_POST['classid'];
    $currentDateTime = date('Y-m-d h:i A');
    $teacherId = $_SESSION['user_created']['id'];
    commentPrivate( $assigmentId, $_SESSION['user']['id'], $classComment,$currentDateTime, $teacherId);
}

header('location: /assignment_student?id=' . $_POST['classid']);
