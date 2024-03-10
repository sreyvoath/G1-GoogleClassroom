
<?php

session_start();
require_once '../../database/database.php';
require_once('../../models/assignments/assignment.model.php');
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['title']) && isset($_POST['content']) && isset($_POST['document']) && isset($_POST['score']) && isset($_POST['end_date'])) {
        $title = htmlspecialchars($_POST['title']);
        $content = htmlspecialchars($_POST['content']);
        $document = htmlspecialchars($_POST['document']);
        $score = htmlspecialchars($_POST['score']);
        $id = htmlspecialchars($_POST['id']);
        $class_id = $_SESSION['class_id'];
        // get datetime
        $end_date = htmlspecialchars($_POST['end_date']);
        $end_time = htmlspecialchars($_POST['end_time']);

        $class_id = $_SESSION['ass_id'];


        if (updateAssign($title, $content, $document, $filepath, $score, $end_date, $end_time, $class_id, $id)) {
            header("Location: /stream?id=$class_id");
        } else {
            header("Location:/create-work");
        }
    }
}

?>