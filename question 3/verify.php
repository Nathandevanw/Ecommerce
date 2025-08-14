<?php
session_start();
if (!isset($_SESSION['verification_code'])) {
    echo "You must login first.";
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Enter OTP Code</title>
</head>
<body>
<h2>Two-Factor Authentication</h2>
<p>We have sent a verification code to your email. Please enter it below:</p>

<?php
// For demo only (remove in production)
if (isset($_SESSION['demo_code'])) {
    echo "<p><b>Demo Code:</b> " . $_SESSION['demo_code'] . "</p>";
}
?>

<form action="verifycheck.php" method="post">
    <label>Verification Code:</label><br>
    <input type="text" name="user_code" required><br><br>
    <button type="submit">Verify Code</button>
</form>
</body>
</html>
