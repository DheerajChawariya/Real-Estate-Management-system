<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'php mailer/src/Exception.php';
require 'php mailer/src/PHPMailer.php'; 
require 'php mailer/src/SMTP.php';    

//Retrieve form data and sanitize inputs
$senderMail = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
$senderName = htmlspecialchars($_POST['name']);
$message = htmlspecialchars($_POST['message']);
$subject = htmlspecialchars($_POST['subject']);

if (!filter_var($senderMail, FILTER_VALIDATE_EMAIL)) {
    echo "<script>alert('Invalid email format'); window.history.back();</script>";
    exit;
}

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'dheerajkumar6112003@gmail.com';                     // SMTP username
    $mail->Password   = 'dxypfouxoeuyyovm';                               // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;            // Enable TLS encryption
    $mail->Port       = 587;                                    // TCP port to connect to; use 587 for TLS

    //Recipients
    $mail->setFrom($senderMail, $senderName);  // Set sender's email and name
    $mail->addAddress('dheerajkumar6112003@gmail.com', 'Mailer');  

    //Content
    $mail->isHTML(true);                               
    $mail->Subject = $subject;
    $mail->Body    = "<p><strong>Name:</strong> $senderName</p>
                      <p><strong>Email:</strong> $senderMail</p>
                      <p><strong>Subject:</strong> $subject</p>
                      <p><strong>Message:</strong><br>$message</p>";

    $mail->send();
    header("Location: index.php");
    exit;
} catch (Exception $e) {
    echo "<script>alert('Message could not be sent. Mailer Error: {$mail->ErrorInfo}'); window.history.back();</script>";
}
?>
