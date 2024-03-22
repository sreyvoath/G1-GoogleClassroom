<?php
require '../../database/database.php';
require '../../models/signin.model.php';
require "../../models/signup.medel.php";
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email_verify = $_POST['email_verify'];
    $password_verify = $_POST['pwd_verify'];
    if (!preg_match('/^(?=.*[!@#$])[a-zA-Z0-9!@#$]{8,}+$/', htmlspecialchars($password_verify))) {
        $_SESSION['new_password'] = "Password is not secure!";
        $_SESSION['new_name'] = "It's require!";
        header("Location:/views/signin/reset_newpass.view.php");
        exit;
    }
    if (isset($_POST['email_verify']) && isset($_POST['pwd_verify'])) {
        $passwordEncript = password_hash($password_verify, PASSWORD_BCRYPT);
        updatePassword($email_verify, $passwordEncript);
        header("Location:/user-signin");
    }
}
