<?php
session_start();

$user_code = $_POST['code'];
$stored_code = $_SESSION['verification_code'];

if ($user_code == $stored_code) {
    $is_success = true;
    $message = "You have entered 2FA secret code correctly. Login Successful!";
    unset($_SESSION['verification_code']); // Clear the session variable
} else {
    $is_success = false;
    $message = "You have entered Wrong 2FA secret code. Login Failed!";
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login Status</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="status-container">
        <?php if ($is_success): ?>
            <h2 class="success">Login Successful!</h2>
            <p><?php echo $message; ?></p>
        <?php else: ?>
            <h2 class="failure">Login Failed!</h2>
            <p><?php echo $message; ?></p>
        <?php endif; ?>
        <a href="index.php" class="back-link">Go back to login</a>
    </div>
</body>
</html>