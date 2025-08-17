<?php
// Handle POST request only
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // reCAPTCHA v3 secret key
    $secret = "6Le4bKIrAAAAABR7a9xfs01j-DGiHdMnSNNYogtf";
    $token  = $_POST['g-recaptcha-response'] ?? '';
    // Verify the token with Google reCAPTCHA server
    $resp = file_get_contents(
        "https://www.google.com/recaptcha/api/siteverify?secret="
        . urlencode($secret) . "&response=" . urlencode($token)
    );
    $data = json_decode($resp, true);


    /*
     * In v3, 'success' confirms the request is verified
     * and 'score' (0.0 - 1.0) gives confidence level
     * > 0.5 = human, < 0.5 = suspicious
     */
    $ok      = !empty($data['success']);
    $action  = $data['action'] ?? '';
    $score   = isset($data['score']) ? (float)$data['score'] : 0.0;
    $passed  = $ok && $action === 'register' && $score >= 0.5;

    if ($passed) {
        echo "Form Submit Successfully.";
    } else {
        echo "You are a robot";
    }
}

