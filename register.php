<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Registration</title>
        <link rel="stylesheet" type="text/css" href="style.css">   
    </head>
    <body>
        <h1> Register Here! </h1>
            <form id="registerForm" action="checkRegister.php" method="POST" onsubmit="return validateRegistration(this);">
                <table border="0">
                    <tbody>
                        <tr>
                            <td>Username</td>
                            <td>
                                <input type="text" name="username" value="<?php
                                if (isset($_POST) && isset($_POST['username'])){
                                    echo $_POST['username'];
                                }
                                ?>" />
                                <span id="usernameError" class="error">
                                <?php // PHP code that calls the error message and display it if fields are left blank 
                                if (isset($errorMessage) && isset($errorMessage['username'])) {
                                    echo $errorMessage['username'];
                                }
                                ?>
                                </span>
                            </td>
                        </tr>
                        <tr>
                            <td>Password</td>
                            <td>
                                <input type="password" name="password" value="" />
                                <span id="passwordError" class="error">
                                <?php
                                if (isset($errorMessage) && isset($errorMessage['password'])) {
                                    echo $errorMessage['password'];
                                }
                                ?>
                                </span>
                            </td>
                        </tr>
                        <tr>
                            <td>Confirm Password</td>
                            <td>
                                <input type="password" name="password2" value="" />
                                <span id="password2Error" class="error">
                                <?php
                                if (isset($errorMessage) && isset($errorMessage['password2'])) {
                                    echo $errorMessage['password2'];
                                }
                                ?>
                                </span>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="submit" value="Register" name="register" /> <!-- Register button -->
                            </td>
                        </tr>
                    </tbody>
                </table>
            </form>
        <script type="text/javascript" src="js/register.js"></script> <!-- Links the JS file that does the checks to this form -->
    </body>
</html>
