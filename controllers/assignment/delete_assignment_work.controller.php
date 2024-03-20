<?php
session_start();
require_once '../../database/database.php';
require_once('../../models/assignments/assignment.model.php');
$class_id = $_SESSION['ass_id'];
// ========check class id =======
$id = $_GET['id'] ? $_GET['id'] : null;
if (isset($id)) {
    deleteAssign($id);
    header("Location: /instruction?id=$id");
}
?>