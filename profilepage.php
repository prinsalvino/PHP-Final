<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>User List Page</title>
<link href="style.css" rel="stylesheet" type="text/css">
</head>
	<?php
	include "header.php";
	?>
<body class = "welcomebody">
	<?php
	session_start();
	include 'AutoLoaderIncl.php';
	$userController = new UserController();
	
	$user = $userController->getCurrentUser($_SESSION["email"]);	

		
		?>
	<h3 class = "titleforPage">Profile</h3>
	

	<div class = "Profile">
	<?php
		if ($userController->checkPic($_SESSION["email"])) {
			echo "<img src='uploads/".$_SESSION["email"].".jpg' alt=' Profile Picture' width='100' height='100'> ";
		}
		else{
			echo "<img class = 'profilepic' src='img/profile.png' alt=' Profile Picture' width='100' height='100'>";
		}
	?>

		<form action="profilepic.php" method="POST" enctype="multipart/form-data">
			<input type="file" name="file">
			<button type="submit" name="submit">Upload</button>
		</form>
		
		<form class = "box" action="profile.php" method="POST">
			name: *only alphabet*<input class = "textbox" type="text" value = <?php echo $user->name; ?> pattern="[a-zA-Z]{1, 1}" title="Only Alphabet" name="name" ><br>
            email: <input class = "textbox" type="text" value = <?php echo $user->email; ?> name="email" ><br>
			Address: <input class = "textbox" type="text" value = "<?php echo $user->address; ?>" name="address" ><br><br>

			Birth Date: <?php echo $user->birthDate; ?> <br><br>


		
			password: <input class = "textbox" type="password" placeholder = "password" name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" ><br>
            repeatpassword: <input class = "textbox" type="password" placeholder = "repeatpassword" name="repeatpassword" ><br>
			
            <input class = "btn" type="submit" name = "submit_change" value = "Save Changes">
			
        </form>

		
	</div>
</body>
</html>

<?php
session_start();
if(!isset($_SESSION['email'])){
	header("location: index.php");
}
?>


