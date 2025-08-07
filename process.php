<?php
  
if($_SERVER["REQUEST_METHOD"] === "POST")
{
  
    $recaptcha_secret = "REPLACE-WITH-SECRET-KEY";
    $response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".$recaptcha_secret."&response=".$_POST['g-recaptcha-response']);
    $response = json_decode($response, true);
  
    if($response["success"] === true){
        echo "Form Submit Successfully.";
    }else{
        echo "You are a robot";
    }
  
}