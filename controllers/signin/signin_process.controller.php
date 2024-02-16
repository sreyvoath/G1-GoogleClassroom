<?php
session_start();
require_once '../../database/database.php';
require_once '../../models/signin.model.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Escape the query string to prevent SQL injection.
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);
    // Get data from database
    $user = getUser($email);

    // Check if user exists
    if (count($user) > 0) {
        // Check if password is correct
        if (password_verify($password, $user[3])) {
            $_SESSION['user'] = $user;
            header('Location:/home');
        } else {
            $_SESSION['pass-error'] = "Password is incorrect";
        }
    } else {
        echo "No user found";
    }
}

