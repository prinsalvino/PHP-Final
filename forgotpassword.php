<?php
include 'AutoLoaderIncl.php';

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();


if(isset($_POST['submit_email']) && $_POST['email']){
	$email = $_POST['email'];
	$user = new UserController();
	
	$_SESSION['email']= $email;
	

	
	if($user->sendEmailForgotPassword($email) == true){
		header("Location: confirmedsent.php");
	}
	else{
		header("Location: forgotpasswordpage.php?emaildoesnotexist");
	}
}
else{
	header("Location: forgotpasswordpage.php?error=emptyFields");
}
?>