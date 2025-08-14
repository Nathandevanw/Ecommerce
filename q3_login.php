<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Q3 – Email-based 2FA Login</title>
</head>
<body>
  <h2>Login</h2>
  <form action="q3_process_login.php" method="post">
    <label>Email:</label><br>
    <input type="email" name="email" required><br><br>

    <label>Password:</label><br>
    <input type="password" name="password" required><br><br>

    <input type="checkbox" name="remember"> Remember my email<br><br>

    <button type="submit">Login</button>
  </form>
</body>
</html>

