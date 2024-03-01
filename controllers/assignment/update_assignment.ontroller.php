<?php
session_start();
require_once '../../database/database.php';
require_once('../../models/assignments/assignment.model.php');
if ( $_SERVER['REQUEST_METHOD']=='POST'){
    if (isset($_POST['title']) && isset($_POST['content']) && isset($_POST['document']) && isset($_POST['score']) && isset($_POST['deadline'])){
        $title = $_POST['title'];
        $content = $_POST['content'];
        $document = $_POST['document'];
        $score = $_POST['score'];
        $id = $_POST['id'];
        $class_id = $_SESSION['class_id'];

        // get datetime
        $date = date_create($_POST['deadline']) ;
        $deadline = date_format($date, 'Y-m-d H:i: a');
        updateAssign($title, $content, $document, $score, $deadline, $class_id, $id);
    }
    header("Location:/classwork");
    
}

?>