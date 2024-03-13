<?php 
session_start();
require_once '../../../database/database.php';
require_once('../../../models/assignments/assignment.model.php');

// ========check class id =======
$id = $_GET['id'] ? $_GET['id'] : null;
if (isset($id)) {
    $ass_id = $_SESSION['assign_id'];
    deleteAssignUplaod($id);
    header("Location: /assignment_student?id=$ass_id");
}

?>
