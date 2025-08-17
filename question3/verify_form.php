<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Verify Code</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container d-flex justify-content-center align-items-center vh-100">
        <div class="login-container">
            <h2>Two Factor Authentication</h2>
            <p class="text-center">We have sent a secret code to your email. Please check your email and insert the code in the following input field:</p>
            <form action="verify.php" method="post">
                <div class="mb-4">
                    <label for="code" class="form-label">Two Factor Authentication Code</label>
                    <input type="text" name="code" id="code" class="form-control" placeholder="Enter Secret Code Here" required/>
                </div>
                <div class="d-grid gap-2">
                    <input type="submit" name="btnVerify" class="btn btn-primary" value="Verify Code"/>
                </div>
            </form>
        </div>
    </div>
</body>
</html>