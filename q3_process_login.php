<?php
session_start();

$valid_email    = "s4036295@student.rmit.edu.au"; 
$valid_password = "1234";                         

$email = filter_var($_POST['email'] ?? '', FILTER_SANITIZE_EMAIL);
$pass  = $_POST['password'] ?? '';

if ($email !== $valid_email || $pass !== $valid_password) {
    exit("Invalid login credentials.");
}

// ====== Generate OTP and store in session (5 min expiry) ======
$code = random_int(100000, 999999);
$_SESSION['q3_email']      = $email;
$_SESSION['q3_code']       = (string)$code;
$_SESSION['q3_expires_at'] = time() + 5 * 60; // 5 minutes



require __DIR__ . '/PHPMailer/src/PHPMailer.php';
require __DIR__ . '/PHPMailer/src/SMTP.php';
require __DIR__ . '/PHPMailer/src/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

try {
    $mail = new PHPMailer(true);

    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = 'dropio2902@gmail.com';     // <-- your Gmail
    $mail->Password   = 'lkmb itcm plvy kcwn';  // <-- 16-char App Password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // TLS
    $mail->Port       = 587;

    $mail->CharSet = 'UTF-8';
    $mail->setFrom('dropio2902@gmail.com', 'Alice E-Commerce');
    $mail->addAddress($email); // send to the RMIT email used at login

    $mail->Subject = 'Your MFA Verification Code';
    $mail->Body    = "You need provide the following code to login.\n\nYour verification code is: {$code}";

    $mail->send();

}

header("Location: q3_enter_code.php");
exit;
