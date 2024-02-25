<?php
require "../../database/database.php";
require "../../models/archive.model.php";

// ======== check id if we click on the archive===========
if (!empty($_GET['id'])) {
    $id = $_GET['id'];

// ===== call funtion archiveClass ==========
    $success = archiveClass($id);

    // Check if archiving was successful or not
    header('location: /home');
}
