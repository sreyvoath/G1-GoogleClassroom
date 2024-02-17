<?php
require_once '../../database/database.php';
require_once('../../models/class.model.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!empty($_POST['title']) and !empty($_POST['section'])  and !empty($_POST['subject'])) {
        $title = $_POST['title'];
        $section = $_POST['section'];
        $subject = $_POST['subject'];
        $user_id = 3;
        $archive = 1;
        $category_id = 2;
        createClass($title,  $section,  $subject,  $user_id,  $archive,  $category_id);
        header('location:/home');
        // 
    }else {
        echo "<script>alert('You must complete all fields.');</script>";
        header('refresh:0; url=/home');
    }
}
?>
