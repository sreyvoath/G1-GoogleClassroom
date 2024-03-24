<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../../database/database.php';
require '../../models/signin.model.php';
require "../../models/signup.medel.php";
require '../../vendor/autoload.php';
session_start();
// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['send'])) {
    $teacherEmail = $_POST["email"];
    $code = substr(str_shuffle(str_repeat("0123456789", 5)), 0, 6);
    
    try {
        // Initialize PHPMailer
        $mail = new PHPMailer(true);

        // SMTP configuration
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Enable TLS encryption
        $mail->Port = 587; // TCP port to connect to
        $mail->Username = 'emcha7231@gmail.com'; // Replace with your SMTP username
        $mail->Password = 'usoh cqat imdz chuw'; // Replace with your SMTP password

        // Disable SSL certificate verification (optional)
        $mail->SMTPOptions = array(
            'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
            )
        );

        $mail->setFrom("emcha7231@gmail.com", "E-CLASSROOM code verify"); // Update with your website name
        $mail->addAddress($teacherEmail); // Send email to the provided email address
        $mail->isHTML(true); // Set email format to HTML
        $mail->Subject = 'Here is code verify'; // Subject of the email
        $user = accountExists($teacherEmail);
        if(count($user)>0){
            $passCode = getPassCode($teacherEmail);
        }
        else{
            $_SESSION['err_not_found'] = "User not found";
            
        }

        $mail->Body = 'Your code:'. $passCode['pass_verify']; // Body of the email

        // Send email
        $mail->send();
        header("location: /views/signin/code_verify.view.php");
    } catch (Exception $e) {
        // Error handling
        $_SESSION['err_not_found'] = "Your email not found";
        header("location: /views/signin/reset_password.view.php");
    }
}

?>
