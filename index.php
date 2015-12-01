<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Login Page</title>
    </head>
    <body>
        <h2>Login Page</h2>
        <form action="attemptLogin.php" method="post">
            <fieldset>
                Enter your Email <br/>
                <input type="text" placeholder="Email" id="emailAddress" name="EmailAddress" required><br/><br/>
                Enter your password<br/>
                <input type="password" placeholder="Password" id="password1" name="Password" required>
                <button type="submit">Login</button>
            </fieldset>
        </form>
        <p>Don't have an account? Register here!</p>
        <a href="registrationPage.php"><button>Register!</button></a>
    </body>
</html>
