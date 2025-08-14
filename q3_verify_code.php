<?php
session_start();

$expected = $_SESSION['q3_code'] ?? null;
$expires  = $_SESSION['q3_expires_at'] ?? 0;
$userCode = preg_replace('/\D/', '', $_POST['user_code'] ?? '');

if (!$expected) { exit('Session expired. Please login again.'); }
if (time() > $expires) {
  session_unset();
  exit('Code expired. Please login again.');
}

$ok = hash_equals($expected, $userCode);

unset($_SESSION['q3_code'], $_SESSION['q3_expires_at']);

if ($ok) {
  echo '<h3>You have entered MFA secret code correctly. Login Successful!</h3>';
} else {
  echo '<h3>You have entered Wrong 2FA secret code. Login Failed!</h3>';
}
