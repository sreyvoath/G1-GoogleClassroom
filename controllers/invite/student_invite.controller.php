<?php
session_start();
require_once '../../database/database.php';
require_once('../../models/user_join_class/student.model.php');
require_once('../../models/user_join_class/class.model.php');
require_once('../../models/invites/invite.model.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../../vendor/autoload.php';

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['send'])) {
    $teacherEmail = $_POST["email"];
    // $teacherMessage = $_POST['teacherMessage'];

    try {
        // Initialize PHPMailer
        $mail = new PHPMailer(true);

        // SMTP configuration
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Enable TLS encryption
        $mail->Port = 587; // TCP port to connect to
        $mail->Username = $_SESSION['user_created']['email']; // Replace with your SMTP username
        $mail->Password = 'usoh cqat imdz chuw'; // Replace with your SMTP password

        // Disable SSL certificate verification (optional)
        $mail->SMTPOptions = array(
            'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
            )
        );

        $mail->setFrom($_SESSION['user_created']['email'], strtoupper($_SESSION['user_created']['name'])); // Update with your website name
        $mail->addAddress($teacherEmail); // Send email to the provided email address
        $mail->isHTML(true); // Set email format to HTML
        $mail->Subject = 'Teacher invite'; // Subject of the email
        $mail->Body = 'Invited you to join class'; // Body of the email

        // Send email
        $mail->send();
        echo "Message has been sent successfully";
        header("location: /people");
    } catch (Exception $e) {
        // Error handling
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}


// Invite student and handle database operations
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (!empty($_POST['email'])) {
        $email = htmlspecialchars($_POST['email']);
        $classId = $_SESSION['class_id'];

        $checkEmail = checkEmailUser($email);

        if ($checkEmail) {
            $userId = $checkEmail['id'];
            $checkEmailExists = checkEmailUserExits($userId, $classId);

            if ($checkEmailExists) {
                $_SESSION['err_exist_join'] = "This user already joined!";
            } else {
                if (createMessage("Invited you", $userId, $classId, $_SESSION['user']['id'])) {
                    $_SESSION['success_message'] = "Invitation sent successfully.";
                } else {
                    $_SESSION['err_db'] = "Error while sending invitation. Please try again.";
                }
            }
        } else {
            $_SESSION['err_not_found'] = "User not found";
        }
    } else {
        $_SESSION['err_empty_email'] = "Email field is empty";
    }

    header("location:/people");
}
