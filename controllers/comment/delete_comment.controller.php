<?php
session_start();
require_once "../../database/database.php";
require_once("../../models/comments/comment.model.php");
// ========check class id =======
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    deleteComment($id);
}
header('location: /instruction?id=' . $_SESSION['assign_id']);
