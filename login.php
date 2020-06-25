<?php
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include 'AutoLoaderIncl.php';
//Include DB


$password =  $_POST["password"];
$email =  $_POST["email"];
	
$user = new UserController();
	
if(	$user->verifyLogin($email, $password) == true){
	$_SESSION['email'] = $email;
	if ($user->getPic($email) == true) {
		$_SESSION["img"] = $user->getPic($email);
	}
	else{
		$pic = "profile.png";
	}
	
	header("location: welcome.php?Login=Successful");
}
else{
	header("location: index.php?Login=Unsuccessful");
}
 ?>

    