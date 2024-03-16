<?php
session_start();
require_once '../../database/database.php';
require_once '../../models/assignments/assignment.model.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_FILES['upload'])){
        // $title = "Uploaded File"; // You can change this as per your requirement
        $id = $_POST['id'];
        // File upload handling
        $targetDir = "../../assets/images/upload/";
        $targetFile = $targetDir . basename($_FILES["upload"]["name"]);
        $uploadOk = 1;
        $fileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

        // Check file size
        if ($_FILES["upload"]["size"] > 5000000) { // Adjust the size limit as needed (5MB in this case)
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }

        // Allow certain file formats
        if (!in_array($fileType, array("pdf", "docx", "xlsx"))) {
            $uploadOk = 0;
            $_SESSION['err-uplaod'] = "Sorry, only PDF, DOCX, and XLSX files are allowed.";
        }

        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            // $_SESSION['err-uplaod'] = "Sorry, your file was not uploaded.";
            header("Location: /assignment_student?id=$id");
        } else {
            if (move_uploaded_file($_FILES["upload"]["tmp_name"], $targetFile)) {
                // File uploaded successfully, now store file information in the database
                $filename = basename($_FILES["upload"]["name"]);
                $filepath = $targetFile;

                // Insert assignment details into the database
                if (studentUpload($filename, $filepath, $_POST['id'], $_SESSION['user']['id'])) {
                    // Handle successful upload
                   
                    header("Location: /assignment_student?id=$id");
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
?>
