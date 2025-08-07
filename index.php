<html>
  <head>
    <title>Question 1</title>
    <script src='https://www.google.com/recaptcha/api.js' async defer></script>
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

      <form action="process.php" method="post">
        <div>
          <label for="email">Email address:</label><br/>
          <input type="text" id="email" name="email">
        </div>

        <div>
          <label for="password">Password:</label><br/>
          <input type="password" id="password" name="password">
        </div>

        <div>
          <label for="confirmPassword">Re-type Password:</label><br/>
          <input type="password" id="confirmPassword" name="confirmPassword" oninput="checkPasswordsMatch()">
        </div>

        <!-- Live match message -->
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
          <div class="g-recaptcha" data-sitekey="REPLACE-WITH-SITE-KEY"></div>
        </div>

        <div>
          <button type="submit" class="btn btn-primary">Create Account</button>
        </div>
      </form>
    </div>

  </body>
</html>
