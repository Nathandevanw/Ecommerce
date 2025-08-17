<?php
  
if($_SERVER["REQUEST_METHOD"] === "POST")
{
    // reCAPTCHA secret key (from Google reCAPTCHA dashboard)
    $recaptcha_secret = "6LdJWKIrAAAAAPkJPHHohJPo3HwKt65yvfnpPff0";
    // Send POST request to Google for verifying token
    $response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".$recaptcha_secret."&response=".$_POST['g-recaptcha-response']);
    // Decode JSON response from Google
    $response = json_decode($response, true);
    // If success = true:  human user, otherwise: likely a bot
    if($response["success"] === true){
        echo "Form Submit Successfully.";
    }else{
        echo "You are a robot";
    }
  
}