<?php
require '../../database/database.php';
require "../../models/class.model.php";

$id = $_GET["id"] ? $_GET["id"] : null;
if (isset($id)) {
    $class = getClass($id);
   

    require "../../views/classes/class.edit.view.php";
}

