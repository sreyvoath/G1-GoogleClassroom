<?php
session_start();
require "../../database/database.php";
require "../../models/class.model.php";
require "../../models/user_join_class/class.model.php";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['code'])) {
        $code =  $_POST['code'];
        $class = getClassCode($code);
        $classId = $class['id'];
        $studentId = $_SESSION['user']['id'];
        createUserJoinClass($studentId, $classId);
    }
    header("location:/home");
}
// check if wrong code will be alert ( to do )