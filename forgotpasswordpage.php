<!doctype html>
<html>
	<head>
		<meta charset = "utf-8">
		<link rel = "stylesheet" href ="stylelogin.css">
		<title>Forgot Password</title>
	</head>

	<body>
		<h1 class = "forgot"> Forgot Password </h1>
       	 	<form class = "loginbox" action="forgotpassword.php" method="POST">
          	 	email: <input class = "textbox" type="text" placeholder = "email" name="email"><br>
				<input class = "btn" type="submit" name = "submit_email" value = "Reset Password">
				
				<a href="index.php" class = "loginbtn"> Login </a>

        	</form>
	</body>
</html>