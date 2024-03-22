<?php
session_start();
require_once "../../database/database.php";
require_once "../../models/comments/comment.model.php";
date_default_timezone_set('Asia/Phnom_Penh');
if (isset($_POST['classname']) && isset($_POST['classid'])) {
    $userId = $_SESSION['user']['id'];
    $classComment = $_POST['classname'];
    $assigmentId = $_POST['classid'];
    $currentDateTime = date('h:i A');
    commentPublic($assigmentId, $userId, $classComment,$currentDateTime, $_SESSION['user_created']['id']);
}
header('location: /instruction?id=' . $_POST['classid']);
