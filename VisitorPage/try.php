<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

$email = 'monalizapalafox@gmail.com'; // Your Gmail address
$password = 'RRVVproject'; // Your Gmail password or App Password
$smtpHost = 'smtp.gmail.com'; // SMTP host for Gmail
$smtpPort = 587; // SMTP port for TLS
$recipientEmail = 'mppalafox@ccc.edu.ph'; // Recipient's email address


// Generate a random OTP
$otp = rand(100000, 999999);

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);


try {
    //Server settings                  
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = '$smtpHost';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = '$email';                     //SMTP username
    $mail->Password   = '$password';                               //SMTP password
    $mail->SMTPSecure = 'tls';            //Enable implicit TLS encryption
    $mail->Port       = $smtpPort;                                  //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom($email, 'TRY');
    $mail->addAddress($recipientEmail, 'Recipient Name');    //Add a recipient
                                    
    $mail->Subject = 'Your OTP';
    $mail->Body    = 'Your OTP is: ' . $otp;
   
    $mail->send();
    echo 'OTP has been sent to your email';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}