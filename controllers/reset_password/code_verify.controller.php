<?php
require '../../database/database.php';
require '../../models/signin.model.php';
require "../../models/signup.medel.php";
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['send'])) {
    $code = $_POST['code_verify'];

    // $code = substr(str_shuffle(str_repeat("0123456789", 5)), 0, 6);
    $codeVerify=executePassCode($code);
    

    if(count($codeVerify)>0){
        header('location: /views/signin/reset_newpass.view.php');
    }else{
        $_SESSION['err_not_found'] = "User not found";
        header('location: /views/signin/code_verify.view.php');
    }

    
}
