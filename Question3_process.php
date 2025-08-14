<?php
session_start();

$valid_email = "s4036295@student.rmit.edu.au";
$valid_password = "1234";

if ($_POST['email'] === $valid_email && $_POST['password'] === $valid_password) {
    $code = rand(100000, 999999);
    $_SESSION['verification_code'] = $code;
    $_SESSION['code_expiry'] = time() + 300; // 5 minutes validity

    $to = $valid_email;
    $subject = "Your 2FA Verification Code";
    $message = "Your verification code is: $code";
    $headers = "From: no-reply@ecommerce.local";

    // Send the email (ensure local mail server is configured)
    mail($to, $subject, $message, $headers);

    echo "<p>We have sent a secret code to your email.</p>";
    echo '<form action="Question3_Authenticate.php" method="post">
            <label>Two Factor Authentication Code:</label>
            <input type="text" name="user_code" required>
            <button type="submit">Verify Code</button>
          </form>';
} else {
    echo "Invalid login credentials.";
}
?>
