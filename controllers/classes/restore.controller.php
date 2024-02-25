<?php
require "../../database/database.php";
require "../../models/archive.model.php";

// ========check class id=======
if (!empty($_GET['id'])) {
    $id = $_GET['id'];

// ==========call function restore archive===========
    $success = restoreClass($id);
    header('location: /archive');
}
 