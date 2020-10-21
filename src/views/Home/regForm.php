<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registation</title>
<!--    <link rel="stylesheet" href="Styles/RegisterLogin_form.css">-->
</head>
<form>
    <body>
    <form method="post">
        <div class="container">
            <h1>Register</h1>
            <p>Please fill in this form to create an account.</p>
            <hr>
            <label for="email"><b>First_name</b></label>
            <label>
                <input type="text" placeholder="Enter First name" name="First_name" required>
            </label>

            <label for="email"><b>Last_name</b></label>
            <label>
                <input type="text" placeholder="Enter Last name" name="Last_name" required>
            </label>

            <label for="email"><b>Login</b></label>
            <label>
                <input type="text" placeholder="Enter Login" name="Login" required>
            </label>

            <label for="psw"><b>Password</b></label>
            <label>
                <input type="password" placeholder="Enter Password" name="Password" required>
            </label>
            <p><?php var_dump($connect); ?></p>>

            <button type="submit" class="registerbtn">Register</button>
        </div>

        <div class="container signin">
            <p>Already have an account? <a href="">Sign in</a>.</p>
        </div>
    </form>
    </body>
</html>