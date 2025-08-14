<!DOCTYPE html>
<html>
  <head>
    <title>Q3 -  Simple Multi-Factor Authentication </title>
    <link rel="stylesheet" href="style.css">
    <style>
      .error-message {
        color: red;
        margin-top: 5px;
      }
      .success-message {
        color: green;
        margin-top: 5px;
      }
    </style>
  </head>    
  <body>
    <div>
    <h1 class="heading"><b>Login with Multi-Factor Authentication<b></h1>
    <form action="Question3_Process.php" method="post">
      <div>
          <label for="email">Email address:</label><br/>
          <input type="text" id="email" name="email">
        </div>

        <div>
          <label for="password">Password:</label><br/>
          <input type="password" id="password" name="password">
           <p class="hint"><str>Minimum 10 characters.<br> Must include uppercase, lowercase, and number(s).</str></p>
        </div>

        <div>
          <label for="confirmPassword">Re-type Password:</label><br/>
          <input type="password" id="confirmPassword" name="confirmPassword" oninput="checkPasswordsMatch()">
        </div>

        
        <div id="password-match-message"></div>

        <script>
          function checkPasswordsMatch() {
            var password = document.getElementById('password').value;
            var confirmPassword = document.getElementById('confirmPassword').value;
            var messageBox = document.getElementById('password-match-message');

            if (!confirmPassword) {
              messageBox.textContent = "";
              return;
            }

            if (password === confirmPassword) {
              messageBox.textContent = "Passwords match.";
              messageBox.className = "success-message";
            } else {
              messageBox.textContent = "Passwords do not match.";
              messageBox.className = "error-message";
            }
          }

          
        </script>

      

      <button type="submit">Login</button>
