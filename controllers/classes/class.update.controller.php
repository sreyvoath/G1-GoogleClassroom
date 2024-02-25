<?php
require "../../database/database.php";
require "../../models/class.model.php";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (!empty($_POST['classname']) and !empty($_POST['section']) and !empty($_POST['subject']) ) {
        $title = $_POST['classname'];
        $section = $_POST['section'];
        $subject = $_POST['subject'];
        $id = $_POST['id'];
        updateClass($title, $section, $subject, $id);
        header('location: /home');
    }
}
