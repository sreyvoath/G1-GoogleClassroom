<?php
require '../../database/database.php';
require '../../models/class.model.php';

// ========check class id =======
$id = $_GET['id'] ? $_GET['id'] : null;
if (isset($id)) {

    deleteClass($id);
    header('Location: /home');
}
?>