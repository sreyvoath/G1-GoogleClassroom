<?php
session_start();
require_once '../../database/database.php';
require_once('../../models/user_join_class/student.model.php');
require_once('../../models/user_join_class/class.model.php');
require_once('../../models/invites/invite.model.php');
$classId = $_SESSION['class_id'];
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

        $mail->setFrom("emcha7231@gmail.com", strtoupper($_SESSION['user_created']['name'])); // Update with your website name
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

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['email'])) {
        $email =  htmlspecialchars($_POST['email']);
        $checkEmail = checkEmailUser($email);
        if (count($checkEmail) > 0) {
            if ($checkEmail['role'] == 'teacher') {

                $checkEmailExits = checkEmailUserExits($checkEmail['id'], $classId);

                if (count($checkEmailExits) > 0) {
                    $_SESSION['err_exist_join'] = "This user already joined!";
                    header("location:/people");
                }
                if($email != $_SESSION['user_created']['email']){
                    createMessage("Invited you", $checkEmail['id'], $classId, $_SESSION['user']['id']);
                    header("Location: /people?id=$classId");
                    exit;
                }
                else{
                    $_SESSION['err_owner'] = "You cannot invite owner";
                    header("Location: /people?id=$classId");
                    exit;
                }
                if (count($checkEmail) > 0 and count($checkEmailExits) == 0 ) {
                    createMessage("Invited you", $checkEmail['id'], $classId, $_SESSION['user']['id']);
                }
            } else {
                $_SESSION['err-not_here'] = "You cannot invite student here";
                
            }
        } else {
            $_SESSION['err_notfound'] = "User not found";
        }
    } else {
        $_SESSION['err-fill'] = "You must complete all feild";
    }
    header("Location: /people?id=$classId");
}
