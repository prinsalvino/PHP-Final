<!DOCTYPE HTML>
<HTML>
<head>
        <meta charset = "utf-8">
        <link rel = "stylesheet" href ="style.css">
</head>
    <body>
        <h1 class = "signup"> SIGN UP </h1>
        <form class = "loginbox" action="signup.php" method="POST">
			name: *only alphabet*<input class = "textbox" type="text" placeholder = "fullname" pattern="[a-zA-Z]{1, 1}" title="Only Alphabet" name="name" required><br>
            email: <input class = "textbox" type="text" placeholder = "email" name="email" required><br>
            password: <input class = "textbox" type="password" placeholder = "password" name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" 
            title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required><br>
            repeatpassword: <input class = "textbox" type="password" placeholder = "repeatpassword" name="repeatpassword" required><br>
			Birth Date: *you must be older than 6 years old to sign up*<input class = "textbox" type="date" name="birthdate" required><br>
			Address: <input class = "textbox" type="text" placeholder = "Address" name="address" required><br>
			Gender: <br>
			<select name="gender" class = "gender">
    			<option value="Male">Male</option>
   				<option value="Female">Female</option>
    			
  			</select><br>

			
            <input class = "btn" type="submit" name = "button" value = "Sign Up">
			
			<a href="index.php" class = "loginbtn"> Login </a>
        </form> 
    </body>
</HTML>