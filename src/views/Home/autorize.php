<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Autorization</title>
    <link rel="stylesheet" href="Styles/RegisterLogin_form.css">
</head>
</head>
<body>
<form action="" method="post">
    <div class="container">
        <h1>Autorization</h1>
        <p>Please fill in this form to login in account.</p>
        <hr>

        <label for="email"><b>Login</b></label>
        <input type="text" placeholder="Enter Login" name="Login" required>

        <label for="psw"><b>Password</b></label>
        <input type="password" placeholder="Enter Password" name="Password" required>

        <button type="submit" class="registerbtn">Login</button>
    </div>

    <div class="container signin">
        <p>You don't have an account? <a href="">To register</a>.</p>
    </div>
</form>
</body>
</html>