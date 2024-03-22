<?php

session_start();
require_once '../../database/database.php';
require_once '../../models/signin.model.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

//============= set condition escap write script  ==================
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);

//============= get data user from database ==============
    $user = getUser($email);

//============= Check user exists =============
    if (count($user) > 0) {

// =========== check password ==========
        if (password_verify($password, $user[4])) {
            $_SESSION['user'] = $user;
            header('Location:/home');
        } else {
            $_SESSION['password-error'] = "Password is incorrect";
            header("location:/user-signin");
        }
    } else {
        header("location:/user-signin");
        $_SESSION['email-error']= "E-mail is incorrect";
    }
};
