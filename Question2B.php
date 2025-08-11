<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Create Account — reCAPTCHA v3</title>
  <link rel="stylesheet" href="style.css">
  <style>
    .error-message { color: red; margin-top: 5px; }
    .success-message { color: green; margin-top: 5px; }
  </style>

  <!-- Load reCAPTCHA v3 API with your SITE KEY -->
  <script src="https://www.google.com/recaptcha/api.js" async defer></script>

  <script>
    function checkPasswordsMatch() {
      var p = document.getElementById('password').value;
      var c = document.getElementById('confirmPassword').value;
      var msg = document.getElementById('password-match-message');
      if (!c) { msg.textContent = ""; msg.className = ""; return; }
      if (p === c) { msg.textContent = "Passwords match."; msg.className = "success-message"; }
      else { msg.textContent = "Passwords do not match."; msg.className = "error-message"; }
    }

    function onSubmit(token) {
      // When reCAPTCHA passes, submit the form
      document.getElementById("register-form").submit();
    }
  </script>
</head>
<body>

  <main class="wrap">
    <section class="card">
      <h1 class="heading"><b>Create Account</b></h1>

      <form id="register-form" action="verify_v3.php" method="post" class="form" novalidate>
        <div>
          <label for="email">Email address:</label><br/>
          <input class="input" type="email" id="email" name="email" required>
        </div>

        <div>
          <label for="password">Password:</label><br/>
          <input class="input" type="password" id="password" name="password" minlength="10" required>
          <p class="hint">Minimum 10 characters, must include uppercase, lowercase, and numbers.</p>
        </div>

        <div>
          <label for="confirmPassword">Re-type Password:</label><br/>
          <input class="input" type="password" id="confirmPassword" name="confirmPassword"
                 minlength="10" required oninput="checkPasswordsMatch()">
        </div>

        <!-- Live password match message -->
        <div id="password-match-message"></div>

        <!-- reCAPTCHA v3 bind-to-button -->
        <button 
          class="g-recaptcha btn" 
          data-sitekey="6Le4bKIrAAAAAO_aaBu8j5ofVkNmQEkoBHO8pB1i" 
          data-callback='onSubmit' 
          data-action='register'>
          Create Account
        </button>

        <button class="btn" type="reset">Reset</button>


      </form>
    </section>
  </main>

</body>
</html>
