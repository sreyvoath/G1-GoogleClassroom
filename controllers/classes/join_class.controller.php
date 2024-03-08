<?php
session_start();
require "../../database/database.php";
require "../../models/class.model.php";
require "../../models/user_join_class/class.model.php";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['code'])) {
        $code =  $_POST['code'];
        $isClass = getClassCode($code);
        if ($isClass) {
            $classId = $isClass['id'];
            $studentId = $_SESSION['user']['id'];
            createUserJoinClass($studentId, $classId);
            header("location:/home");
        }else{
            $_SESSION['err-code'] = "Code not found!";
            header("location:../../views/classes/join_class.view.php");
        }
    }
}