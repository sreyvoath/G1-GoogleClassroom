<?php
session_start();
require_once '../../database/database.php';
require_once('../../models/assignments/assignment.model.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['title']) && isset($_POST['content']) && isset($_FILES['document']) && isset($_POST['score']) && isset($_POST['end_date'])) {
        $title = htmlspecialchars($_POST['title']);
        $content = htmlspecialchars($_POST['content']);
        $score = htmlspecialchars($_POST['score']);
        $class_id = $_SESSION['class_id'];
        $id = $_POST['id'];

        // get datetime
        $end_date = htmlspecialchars($_POST['end_date']);
        $end_time = htmlspecialchars($_POST['end_time']);

        $existingDocument = getAssign($id)['document'];

        if (!empty($_FILES['document']['name'])) {
            // New file is uploaded, handle file upload
            $targetDir = "../../assets/images/upload/";
            $targetFile = $targetDir . basename($_FILES["document"]["name"]);
            $fileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
            $checkFileSize = $_FILES["document"]["size"];

            if ($checkFileSize > 5000000) {
                echo "Sorry, your file is too large.";
            } elseif (!in_array($fileType, array("pdf", "docx", "xlsx"))) {
                echo "Sorry, only PDF, DOCX, and XLSX files are allowed.";
            } else {
                // File upload is valid, move the file and update the database
                if (move_uploaded_file($_FILES["document"]["tmp_name"], $targetFile)) {
                    $filename = basename($_FILES["document"]["name"]);
                    $filepath = $targetFile;
                    uploadNewFile($title, $content, $filename, $filepath, $score, $end_date, $end_time, $class_id, $id);
                    header("Location: /instruction?id=$id");
                    exit();
                } else {
                    echo "Sorry, there was an error uploading your file.";
                }
            }
        } else {
            // No new file uploaded, update other assignment details without changing the file
            updateAssign($title, $content, $score, $end_date, $end_time, $class_id, $id);
            header("Location: /instruction?id=$id");
            exit();
        }
    }
}
?>


