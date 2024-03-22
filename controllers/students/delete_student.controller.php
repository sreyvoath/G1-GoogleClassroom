<?php
require '../../database/database.php';
require '../../models/user_join_class/student.model.php';
session_start();
$class_id = $_SESSION['class_id'];
// ========check class id =======
$user_id = $_GET['id'] ? $_GET['id'] : null;

if (isset($user_id) and isset($class_id)) {
    deleteStudent($user_id, $class_id);
    header("Location: /people?id=$class_id");
}
