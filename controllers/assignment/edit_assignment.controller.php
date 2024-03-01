<?php
require_once '../../database/database.php';
require_once('../../models/assignments/assignment.model.php');

// ========check class id =======
$id = $_GET["id"] ? $_GET["id"] : null;
if (isset($id)) {
    $assignment = getAssign($id);
    require "../../views/assignment/assignment_edit.view.php";
}
