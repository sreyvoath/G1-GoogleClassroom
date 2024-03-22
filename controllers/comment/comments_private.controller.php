<?php
session_start();
require_once "../../database/database.php";
require_once "../../models/comments/comment.model.php";
$userId = $_POST['student_id'];
date_default_timezone_set('Asia/Phnom_Penh');
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (!empty($_POST['class_name']) && !empty($_POST['class_id'])) {
        $_SESSION['classId'] = $_POST['class_id'];
        $classComment = $_POST['class_name'];
        $assigmentId = $_POST['class_id'];
        $currentDateTime = date('h:i A');
        $teacherId = $_SESSION['user_created']['id'];
        commentPrivate($assigmentId, $userId, $classComment,$currentDateTime, $teacherId);
    }
}
header('Location: /comment_private?id=' . $_POST['class_id'] . '&student_id=' . $userId);
