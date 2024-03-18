<?php
session_start();
require_once '../../../database/database.php';
require_once('../../../models/assignments/assignment.model.php');

if (isset($_SESSION['assignment_submitted'])) {
    $assignments = $_SESSION['assignment_submitted'];
    $ass_id = $_SESSION['assign_id'];
    $currentDateTime = (new DateTime())->format('Y-m-d H:i:s'); 

    foreach($assignments as $assignment){
        $id = $assignment['id'];
        $status = false;
        updateAssignStatus($id, $status) ;
    }
    updateStudentStatus($_SESSION['user']['id'], false);
    header("Location: /assignment_student?id=$ass_id");

}

?>
