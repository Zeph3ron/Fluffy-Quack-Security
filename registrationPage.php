<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>Registration Page</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script>
            //These functions are javascript and are used to dynamically check
            //password and to validate the email
            function checkPass() {
                //Store the password field objects into variables ...
                var pass1 = document.getElementById('password1');
                var pass2 = document.getElementById('password2');
                var button1 = document.getElementById('button1');
                //Store the Confimation Message Object ...
                var message = document.getElementById('confirmMessage');
                //Set the colors we will be using ...
                var goodColor = "#66cc66";
                var badColor = "#ff6666";
                //Compare the values in the password field 
                //and the confirmation field
                if (pass1.value == pass2.value) {
                    //The passwords match. 
                    //Set the color to the good color and inform
                    //the user that they have entered the correct password
                    button1.disabled = false;
                    pass2.style.backgroundColor = goodColor;
                    message.style.color = goodColor;
                    message.innerHTML = "Passwords Match!"
                } else {
                    //The passwords do not match.
                    //Set the color to the bad color and
                    //notify the user.
                    button1.disabled = true;
                    pass2.style.backgroundColor = badColor;
                    message.style.color = badColor;
                    message.innerHTML = "Passwords Do Not Match!"
                }
            }
            function validateEmail() {
                var email1 = document.getElementById('emailAddress');
                var message = document.getElementById('correctEmailMessage');
                var pass1 = document.getElementById('password1');
                var pass2 = document.getElementById('password2');

                var goodColor = "#66cc66";
                var badColor = "#ff6666";
                var re = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;

                if (re.test(email1.value)) {
                    message.style.color = goodColor;
                    message.innerHTML = " Correct email format";
                    pass1.disabled = false;
                    pass2.disabled = false;
                } else {
                    message.style.color = badColor;
                    message.innerHTML = " Wrong email format";
                    pass1.disabled = true;
                    pass2.disabled = true;
                }
            }
        </script>
    </head>

    <body>
        <form action="attemptRegistration.php" method="post">
            <h2>Registration Page</h2>
            <fieldset>
                Enter your Email <br/>
                <input type="email" placeholder="Email" id="emailAddress" name="EmailAddress" required="required" oninput="validateEmail();" onkeyup="validateEmail();"><span id="correctEmailMessage"></span><br/><br/>
                Enter your password of choice<br/>
                <input type="password" placeholder="Password" id="password1" required="required" disabled="true">
                <input type="password" placeholder="Confirm Password" id="password2" required="required" disabled="true" name="Password" onkeyup="checkPass();
                        return false;">
                <span id="confirmMessage"></span><br/><br/>
                <button type="submit" id="button1" disabled="true">Confirm</button>
            </fieldset>
        </form>
    </body>
</html>
