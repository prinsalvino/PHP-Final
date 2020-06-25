<?php
require_once("UserService.php");
require_once("user.php");
class UserController{
	private $UserService = NULL; 

	public function __construct()	
	{
		$this->UserService = new UserService();
	}
	public function getAllUser(){
		return $this->UserService->getAllUser();
	}
	
	public function verifyLogin($email, $password){
		return $this->UserService->verifyLogin($email, $password);
	}
	
	public function insertUser($name, $email, $password, $birthdate, $address, $gender){
		
		return $this->UserService->insertUser($name, $email, $password, $birthdate, $address, $gender,0);
	}
	
	public function checkEmailExist($email){
		return $this->UserService->checkEmailExist($email);

	}
	
	public function sendEmailForgotPassword($email){
		return $this->UserService->sendEmailForgotPassword($email);
	}
	
	public function resetPassword($email, $password){
		return $this->UserService->resetPassword($email, $password);

	}
	
	public function showAllUser(){
		$this->showUser($this->UserService->getAllUser());
	}
	
	public function showUserByEmail($email){
		$this->showUser($this->UserService->getUserbyEmail($email));
	}
	public function showUserByName($name){
		$this->showUser($this->UserService->getUserbyName($name));
	}
	
	public function getCurrentUser($email){
		return $this->getUserData($this->UserService->getUserbyEmail($email));
	}
	public function editProfile($newname, $newemail, $newaddress, $oldemail){
		return $this->editProfile($newname, $newemail, $newaddress, $oldemail);
	}

	public function checkPic($email){
		return $this->returnPic($this->UserService->getPic($email));
	}
	
	public function uploadPic($email){
		return $this->UserService->uploadPic($email);
	}

	public function exportCSV(){
		return $this->UserService->getAllUser();
	}
	function showUser($datas){
		 $no = 1;

		 foreach($datas as $data){
			 echo $no . ". " . $data["Name"] . " || " . $data["Email"] . "<br>" .
				 "Birth Date: " . $data["birthDate"] . "<br>" .
				 "Registration Date and Time: " . $data["registrationDateTime"] . "<br>" .
				 "Gender: " . $data["gender"] . "<br>" .
				 "Address: " . $data["address"] . "<br> <br>" ;

				 $no++;
		 }
	 }
	
	function getUserData($datas){
		$user = new User();
		 foreach($datas as $data){
			 $user->name = $data["Name"];
			 $user->email = $data["Email"] ;
			 $user->birthDate =	 $data["birthDate"] ;
			 $user->address =  $data["address"]  ;
			 $listperson = $user;
		 }
		return $user;
	}

	function returnPic($datas){
		$checkBool = false;
		foreach ($datas as $data) {
			if ($data["checkPic"] == 1) {
				$checkBool = true;
			}
			else{
				$checkBool = false;
			}
		}
		return $checkBool;
	}
}
?>