<?php
session_start();
	include 'AutoLoaderIncl.php';
	
$userController = new UserController();
$newname = $_POST["name"];
$newemail = $_POST["email"];
$newpassword = $_POST["password"];
$newrepeatpassword = $_POST["repeatpassword"];
$newaddress = $_POST["address"];
$oldemail = $_SESSION["email"];

if(isset($_POST["submit_change"])){
	if(!isset($newpassword)){
		if($userController->editProfile($newname, $newemail, $newaddress, $oldemail) == true){
			header("Location: welcome.php?ChangeSuccess");
		}	
		else{
			header("Location: profilepage.php?ChangeNotSuccess");

		}
	}
	else{
		header("Location: profilepage.php?Error");
	}
}

?>
