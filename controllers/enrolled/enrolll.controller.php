<?php
session_start();
require '../../database/database.php';
require '../../models/user_join_class/class.model.php';
require '../../models/user_join_class/student.model.php';

// ========call function for student unenrolled class =======
$id = $_GET['id'] ? $_GET['id'] : null;
if (isset($id)) {
    deleteStudent($_SESSION['user']['id'], $id);
    header("location:/home");
    
}
?>