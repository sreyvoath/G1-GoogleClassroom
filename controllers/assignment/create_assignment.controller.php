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

        // get datetime
        $end_date = htmlspecialchars($_POST['end_date']);
        $end_time = htmlspecialchars($_POST['end_time']);

        // File upload handling
        $targetDir = "../../assets/images/upload/"; // Corrected target directory
        $targetFile = $targetDir . basename($_FILES["document"]["name"]);
        $uploadOk = 1;
        $fileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

        // Check file size
        if ($_FILES["document"]["size"] > 5000000) { // Adjust the size limit as needed (5MB in this case)
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }

        // Allow certain file formats
        if (!in_array($fileType, array("pdf", "docx", "xlsx"))) {
            echo "Sorry, only PDF, DOCX, and XLSX files are allowed.";
            $uploadOk = 0;
        }

        // Check if file already exists
        if (file_exists($targetFile)) {
            echo "Sorry, file already exists.";
            $uploadOk = 0;
        }

        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
        } else {
            if (move_uploaded_file($_FILES["document"]["tmp_name"], $targetFile)) {
                // File uploaded successfully, now store file information in the database
                $filename = basename($_FILES["document"]["name"]);
                $filepath = $targetFile;

                // Insert assignment details into the database
                if (createAssign($title, $content, $filename, $filepath, $score, $end_date, $end_time, $class_id)) {
                    header("Location:/classwork");
                    exit(); // Terminate the script after successful upload
                } else {
                    echo "Error creating assignment.";
                }
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
    }
}
