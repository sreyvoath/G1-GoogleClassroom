<?php
require "../../database/database.php";
require "../../models/archive.model.php";

if (!empty($_GET['id'])) {
    $id = $_GET['id'];

    // Call the archiveClass function to archive the class with the given ID
    $success = archiveClass($id);

    // Check if archiving was successful or not
        header('location: /home');
} 

