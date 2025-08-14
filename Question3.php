<!DOCTYPE html>
<html>
  <head>
    <title>Q3 -  Simple Multi-Factor Authentication </title>
    <link rel="stylesheet" href="style.css">
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
        </div>

        <div>
          <label for="confirmPassword">Re-type Password:</label><br/>
          <input type="password" id="confirmPassword" name="confirmPassword" oninput="checkPasswordsMatch()">
        </div>

      

      <button type="submit">Login</button>
