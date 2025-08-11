<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $secret = "YOUR_V3_SECRET_KEY";
    $token  = $_POST['g-recaptcha-response'] ?? '';

    // Minimal GET request, same style as your snippet
    $resp = file_get_contents(
        "https://www.google.com/recaptcha/api/siteverify?secret="
        . urlencode($secret) . "&response=" . urlencode($token)
    );
    $data = json_decode($resp, true);

    // v3 requires score + action checks
    $ok      = !empty($data['success']);
    $action  = $data['action'] ?? '';
    $score   = isset($data['score']) ? (float)$data['score'] : 0.0;
    $passed  = $ok && $action === 'register' && $score >= 0.5; // adjust threshold as needed

    if ($passed) {
        echo "Form Submit Successfully.";
    } else {
        echo "You are a robot";
        // Optionally: var_dump($data); // to see 'error-codes', score, etc. during testing
    }
}
