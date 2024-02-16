<?php
session_start();
require "../../database/database.php";
require "../../models/signup.medel.php";
function secureData($data){
    $data = trim($data);
    $data = htmlspecialchars($data);
    return $data;
};
$error = [

    "password"=>"",
    "name" => "",
    "email" => ""
    
];
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $password = $_POST["password"];
    $passwordEncript = password_hash($password, PASSWORD_BCRYPT);
    $name = $_POST['name'];
    $email = $_POST['email'];
    $user = accountExists($email);
    if ( count($user)>0) {
        $_SESSION['exist']= "Email already exists";
        header("Location:/user-signup");
        exit;
    }
    if (!empty($name) && (!empty($email)) && (!empty($password))){
        header("Location:/home");
        $_SESSION['error']= $error;
        createAccount($name, $email, $passwordEncript);
    }else{
        header("Location:/user-signup");
        $error['name'] = "It's require!";
        $_SESSION['error']= $error;
        exit;
    }
    if (!preg_match('/^(?=.*[!@#$])[a-zA-Z0-9!@#$]{8,}+$/', secureData($password))) {
        $error['password'] ="Password is not secure!";
        $_SESSION['error']= $error;
        header("Location:/user-signup");
        exit;
    }
    if (empty($error['password'])){
        createAccount($name, $email, $passwordEncript);
        header("Location:/home");
        $_SESSION['error']= $error;
        exit;
    }else{
        header("Location:/user-signup");
        $_SESSION['error']= $error;
        exit;
    };
    

} else {
    // Redirect to the login page if the form is not submitted
    header("Location: /user-signup");
    exit;
}
