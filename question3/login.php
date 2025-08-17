<?php
// Start a new session to store the verification code
session_start();

// Import PHPMailer classes into the global namespace
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

// Load Composer's autoloader
require 'vendor/autoload.php';

// Dummy user data for demonstration
$dummy_email = 's4011924@student.rmit.edu.au';
$dummy_password = 'password';

// Get form data from the POST request
$email = $_POST['email'];
$password = $_POST['password'];
$remember = isset($_POST['remember']) ? true : false;

if ($email === $dummy_email && $password === $dummy_password) {
    // If 'Remember my email' was checked, set a cookie
    if ($remember) {
        // Set a cookie that expires in 30 days
        setcookie('remember_email', $email, time() + (86400 * 30), "/");
    } else {
        // If it was not checked, clear any existing cookie
        setcookie('remember_email', "", time() - 3600, "/");
    }

    // Generate a random 6-digit verification code
    $verification_code = rand(100000, 999999);

    // Store the code in the session to be verified later
    $_SESSION['verification_code'] = $verification_code;

    // Create a new PHPMailer instance
    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';         //Set the SMTP server
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'huuthang2111@gmail.com';               //SMTP username
        $mail->Password   = 'wiuv cjde pajc ysft';                  //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;            //Enable implicit TLS encryption
        $mail->Port       = 587;                                    //TCP port to connect to

        //Recipients
        $mail->setFrom('no-reply@example.com', 'Mailer');
        $mail->addAddress($email);                                  //Add a recipient

        //Content
        $mail->isHTML(false);                                       //Set email format to plain text
        $mail->Subject = 'Your Verification Code';
        $mail->Body    = "Your verification code is: " . $verification_code;

        $mail->send();
        
        // Redirect the user to the verification form
        header("Location: verify_form.php");
        exit();

    } catch (Exception $e) {
        // Display an error message if the email could not be sent
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }

} else {
    // If credentials are wrong, display an error message
    // Also, clear the remember email cookie in case it was a typo
    setcookie('remember_email', "", time() - 3600, "/");
    echo "Invalid email or password.";
}
?>