<?php
session_start();
require_once "../../database/database.php";
require_once "../../models/comments/comment.model.php";

if (isset($_POST['classname']) && isset($_POST['classid'])) {
    $_SESSION['classId'] = $_POST['classid'];
    $userid = $_SESSION['user']['id'];
    $classcomment = $_POST['classname'];
    $assigmentID = $_POST['classid'];
    commentPublic($assigmentID, $userid, $classcomment);
}

header('location: /assignment_student?id=' . $_POST['classid']);
