<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $email = filter_var($_POST['email'] ?? '', FILTER_SANITIZE_EMAIL);
  $p1    = $_POST['password'] ?? '';
  $p2    = $_POST['confirmPassword'] ?? '';

  if ($p1 !== $p2) {
    exit('Passwords do not match.');
  }

  // reCAPTCHA response from Google
  $token = $_POST['g-recaptcha-response'] ?? '';
  $secret = '6Le4bKIrAAAAABR7a9xfs01j-DGiHdMnSNNYogtf';

  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, "https://www.google.com/recaptcha/api/siteverify");
  curl_setopt($ch, CURLOPT_POST, 1);
  curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query([
    'secret' => $secret,
    'response' => $token
  ]));
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  $output = curl_exec($ch);
  curl_close($ch);

  $result = json_decode($output, true);

  if ($result['success'] && $result['action'] === 'register' && $result['score'] >= 0.5) {
    echo "Registration successful.";
    // TODO: Save user to DB with hashed password
  } else {
    echo "Suspicious activity detected or verification failed.";
  }
}
