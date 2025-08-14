<?php
session_start();
if (empty($_SESSION['q3_email']) || empty($_SESSION['q3_code'])) {
  header('Location: q3_login.php'); exit;
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Enter OTP Code</title>
</head>
<body>
  <h2>Two-Factor Authentication</h2>
  <p>We have sent a 6-digit code to: <b><?php echo htmlspecialchars($_SESSION['q3_email']); ?></b></p>
  <form action="q3_verify_code.php" method="post">
    <label>Verification Code:</label><br>
    <input type="text" name="user_code" maxlength="6" pattern="\d{6}" required>
    <button type="submit">Verify Code</button>
  </form>
</body>
</html>
