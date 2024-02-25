<?php
require '../../database/database.php';
require "../../models/class.model.php";

// ========check class id =======
$id = $_GET["id"] ? $_GET["id"] : null;
if (isset($id)) {
    $class = getClass($id);
    require "../../views/classes/class.edit.view.php";
}


