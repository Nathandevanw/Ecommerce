<?php
session_start();

$valid_email = "s4036295@student.rmit.edu.au";
$valid_password = "1234";

if ($_POST['email'] === $valid_email && $_POST['password'] === $valid_password) {
    // Generate OTP
    $code = rand(100000, 999999);
    $_SESSION['verification_code'] = $code;
    $_SESSION['code_expiry'] = time() + 300; // valid 5 min

    // Email setup (can be replaced with PHPMailer or Gmail SMTP)
    $to = $valid_email;
    $subject = "Your 2FA Verification Code";
    $message = "Your verification code is: $code";
    $headers = "From: no-reply@ecommerce.local";

    // If email fails, show code on screen for demo purposes
    if(!mail($to, $subject, $message, $headers)) {
        $_SESSION['demo_code'] = $code; // store for display in verify.php
    }

    header("Location: verify.php");
    exit;
} else {
    echo "Invalid login credentials.";
}
