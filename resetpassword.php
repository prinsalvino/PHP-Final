<?php
include "AutoLoaderIncl.php";
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();


$password = $_POST["password"];
$confirmpassword = $_POST["password2"];
	
$user = new UserController();

$email = $_SESSION["email"];

if( $user->checkEmailExist($email) == true){
	if($password != $confirmpassword){
		header("Location: resetpasswordpage.php?first%and%secondpassword%doesnot%match");
	}
	else{
		if($user->resetPassword($_SESSION["email"], $password) == true){
			header("Location: index.php?passwordResetSuccess");
		}
		else{
			header("Location: resetpasswordpage.php?error");
		}
	}
}
else{
	header("Location: resetpasswordpage.php?cannotfindemail");
}

?>