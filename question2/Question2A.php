<html>
  <head>
    <title>Question 2</title>
    <!-- Load Google reCAPTCHA v2 widget -->
    <script src='https://www.google.com/recaptcha/api.js' async defer></script>
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
      <h1><b>Create Account</b></h1>
      <!-- Simple form protected by reCAPTCHA -->
      <form action="Question2A_process.php" method="post">
        <div>
          <label for="email">Email address:</label><br/>
          <input type="text" id="email" name="email">
        </div>

        <div>
          <label for="password">Password:</label><br/>
          <input type="password" id="password" name="password" minlength="10" required>
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

        <div>
          <div class="g-recaptcha" data-sitekey="6LdJWKIrAAAAAH3hFuS7qsc2IU_jzjZVqfm3kD2_"></div>
        </div>

        <div>
          <button type="submit" class="btn btn-primary">Create Account</button>
        </div>
      </form>
    </div>

  </body>
</html>
