<?php
include 'AutoLoaderIncl.php';

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$name = $_POST["name"];
$email = $_POST["email"];
$password = $_POST["password"];
$repeatpassword = $_POST["repeatpassword"];
$birthdate = $_POST["birthdate"];
$address = $_POST["address"];
$gender = $_POST["gender"];


$user = new UserController();


if (empty($password) || empty($email) || empty($birthdate) || empty($address) || empty($gender) ) {
	header("Location: signuppage.php?error=emptyboxes");

	exit();
}
else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
	header("Location: signuppage.php?error=invalidmail");
    exit();
}
else if ($password !== $repeatpassword) {
    header("Location: signuppage.php?error=passworddoesnotmatch");
	exit();
}
else if (checkAge($birthdate, 6) == false){
	header("Location: signuppage.php?error=invalidBirthdate");
	exit();
}

       
if($user->checkEmailExist($email) == true){
	header("Location: signup.php?error=emailtaken");
    exit();
}
else{
	if($user->insertUser($name, $email, $password, $birthdate, $address, $gender) == true){
		header("location: index.php?SignUp=Successful");
	}
	else{
		header("location: signuppage.php?SignUp=Unsuccessful");
	}
}

function checkAge($birthdate, $min)
{
    $then = strtotime($birthdate);
    //The age to be over, over +6
    $min = strtotime('+6 years', $then);
    if (time() < $min) {
       return false;
    }
	return true;
}
	
?>
