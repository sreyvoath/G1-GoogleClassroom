<?php
require_once '../../database/database.php';
require_once('../../models/assignments/assignment.model.php');

// ========check class id =======
$id = $_GET['id'] ? $_GET['id'] : null;
if (isset($id)) {

    deleteAssign($id);
    header('Location: /classwork');
}
?>