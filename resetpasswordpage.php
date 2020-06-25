<!doctype html>
<html>
	<head>
		<meta charset = "utf-8">
		<link rel = "stylesheet" href ="stylelogin.css">
		<title>Forgot Password</title>
	</head>

	<body>
		<h1 class = "forgot"> Reset Password </h1>
       	 	<form class = "loginbox" action="resetpassword.php" method="POST">
          	 	newpassword: <input class = "textbox" type="password" placeholder = "password" name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required><br> ><br>
				confirmnewpassword: <input class = "textbox" type="password" placeholder = "password" name="password2" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required><br>><br>

				<input class = "btn" type="submit" name = "set_password" value = "Set Password">
				
				
        	</form>
	</body>
</html>
