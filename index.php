<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

//set cookie for a day
$cookie_name = "cookiename";
$cookie_value = "prinscookie";
setcookie($cookie_name, $cookie_value, time() + 86400);
 
?>

<!DOCTYPE HTML>
<HTML>
    <head>
        <meta charset = "utf-8">
        <link rel = "stylesheet" href ="stylelogin.css">
    <body>
        <h1 class = "login"> LOGIN </h1>
        <form class = "loginbox" action="login.php" method="POST">
            email: <input class = "textbox" type="text" placeholder = "email" name="email"><br>
            password: <input class = "textbox" type="password" placeholder = "password" name="password"><br>
            <input class = "btn" type="submit" name = "Login" value = "Login">
			<a href="signuppage.php" class = "extrabutton">Sign Up</a>

			<a href="forgotpasswordpage.php" class = "extrabutton">Forgot Password</a> <br>
        </form>
    </body>
</HTML>