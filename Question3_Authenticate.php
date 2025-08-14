<?php
session_start();

if (!isset($_SESSION['verification_code'])) {
    echo "No verification code found. Please login again.";
    exit;
}

$user_code = $_POST['user_code'];
$stored_code = $_SESSION['verification_code'];
$expiry_time = $_SESSION['code_expiry'];

if (time() > $expiry_time) {
    echo "The verification code has expired. Please login again.";
} elseif ($user_code == $stored_code) {
    echo "<p>You have entered 2FA secret code correctly. Login Successful!</p>";
} else {
    echo "<p>You have entered Wrong 2FA secret code. Login Failed!</p>";
}
?>