<?php
include "DB.php";

class UserService {
private $DB = NULL; 

	public function __construct()	
	{
		$this->DB = DB::getInstance();
    }	
    public function getAllUser() 
    { 
        $sql = "SELECT * FROM users"; 
        $result = $this->DB->connect()->query($sql); 
        $this->DB->closeCon();
		
		return $this->processResult($result);   
    }
	public function getUserbyEmail($email) 
    { 		
        $conn = $this->DB->connect(); 
		
		$stmt = $conn->prepare("SELECT * FROM users WHERE Email LIKE ? ;");
		$stmt->bind_param('s', $email);
		$stmt->execute();
           
		$result = $stmt->get_result();
		
      	return $this->processResult($result);

    }
	
	public function getUserbyName($name) 
    { 		
        $conn = $this->DB->connect(); 
		
		$stmt = $conn->prepare("SELECT * FROM users WHERE Name LIKE  ? ;");
		$stmt->bind_param('s', $name);
		$stmt->execute();
           
		$result = $stmt->get_result();
		return $this->processResult($result);
       
    }
	
	function processResult($result){
		$numRows = $result->num_rows; 
        if ($numRows > 0) 
        {
			while ($row = $result->fetch_assoc()) 
			{ 
				$data[] = $row; 
            } 
			return $data;  
		} 
	}
	
	public function verifyLogin($email,$password)
	{
		try 
		{
			$conn = $this->DB->connect();
			
			$stmt = $conn->prepare("SELECT password FROM users WHERE email = ? ;");
			$stmt->bind_param('s', $email);
			$stmt->execute();
           
			$result = $stmt->get_result();
            $numRows = $result->num_rows; 
            if ($numRows > 0) 
            {
                $password = mysqli_real_escape_string($conn, $password);
                
                $data[]=$result->fetch_array();
                $a =  $data[0];
				$this->DB->closeCon();
				$stmt->close();
				
				//verifying input and decrypting password from DB
				return password_verify($password, $a["password"]);
            }
		}
		catch (Exception $e) {
                echo 'Caught exception: ',  $e->getMessage(), "\n";
        }
	}
	
	public function insertUser($name, $email, $password, $birthdate, $address, $gender, $checkPic){
		try 
		{
			//Encrypting Password
			$hashedpassword = password_hash($password, PASSWORD_DEFAULT);
			$conn=$this->DB->connect();
            $stmt = $conn->prepare("INSERT into users (name, email, password, birthDate, registrationDateTime, address, gender,checkPic) VALUES (?, ?, ?, ?, ?, ?, ?,?) ;");
			
			$regisDate = date("y-m-d h:i:sa");
			
			$stmt->bind_param('sssssssi', $name, $email, $hashedpassword, $birthdate, $regisDate, $address, $gender, $checkPic);
			return $stmt->execute();
			
			$conn->DB->closeCon();
			$stmt->close();
        
		}
		catch (Exception $e) {
                echo 'Caught exception: ',  $e->getMessage(), "\n";
        }
	}
	
	public function checkEmailExist($email){
		try 
		{
			$conn = $this->DB->connect();
			$stmt = $conn->prepare("SELECT Email FROM users WHERE Email = ? ;");
			$stmt->bind_param('s', $email);
			$stmt->execute();
			
			$result = $stmt->get_result();
			
			$numrows = $result->num_rows;
			
			
			if($numrows > 0){
				return true;
			}
			else{
				return false;
			}	
			$conn->DB->closeCon();
			$stmt->close();
		}
		catch (Exception $e) {
                echo 'Caught exception: ',  $e->getMessage(), "\n";
        }
	}
	
	public function sendEmailForgotPassword($email){
		try 
		{
			$conn = $this->DB->connect();
			$stmt = $conn->prepare("SELECT email FROM users WHERE email = ? ;");
			$stmt->bind_param('s', $email);
			$stmt->execute();
			
			$result = $stmt->get_result();
			
			
			$numRows = $result->num_rows; 
        	if ($numRows > 0) 
        	{
				return $this->sendResetEmail($email);
				
			} 
			else{
				return false;
			}

			$conn->DB->closeCon();
			$stmt->close();
        
		}
		catch (Exception $e) {
                echo 'Caught exception: ',  $e->getMessage(), "\n";
        }
	}
	
	
	public function sendResetEmail($email){
		$link = "http://622796.infhaarlem.nl/resetpasswordpage.php";

		$subject = 'Reset Password';
		$message = 'Click On This Link to Reset Password '.$link.' ';
		$headers = 'From:  s622796@server.infhaarlem.nl';
		//check if the email address is invalid $secure_check
		$secure_check = $this->SanitizeEmail($email);
		if ($secure_check == false) {
    		echo "Invalid input";
		} else { //send email 
    		mail($email, $subject, $message, $headers);
			return true;
		}
	}
	//Securing Email
	function SanitizeEmail($field) {
		$field = filter_var($field, FILTER_SANITIZE_EMAIL);
    	if (filter_var($field, FILTER_VALIDATE_EMAIL)) {
        	return true;
    	}	 
		else {
        	return false;
    	}
	}
	
	public function resetPassword($email, $password){
		try{
			$conn = $this->DB->connect();
		
			$hashedpassword = password_hash($password, PASSWORD_DEFAULT);

			$stmt = $conn->prepare("UPDATE users SET password = ? WHERE email = ? ;");
			$stmt->bind_param('ss', $hashedpassword, $email);
			return $stmt->execute();
			
			$conn->DB->closeCon();
			$stmt->close();
		}
		catch (Exception $e) {
                echo 'Caught exception: ',  $e->getMessage(), "\n";
        }

	}
	
	public function editProfile($newname, $newemail, $newaddress, $oldemail){
		try{
			$conn = $this->DB->connect();
		
			$stmt = $conn->prepare("UPDATE users SET Name = ? , Email = ? , address = ? WHERE email = ? ;");
			$stmt->bind_param('ssss', $newname, $newemail, $newaddress, $oldemail);
			return $stmt->execute();
			
			$conn->DB->closeCon();
			$stmt->close();
		}
		catch (Exception $e) {
                echo 'Caught exception: ',  $e->getMessage(), "\n";
        }
	}

	public function getPic($email){
		try{
			$conn = $this->DB->connect(); 
		
			$stmt = $conn->prepare("SELECT * FROM users WHERE email LIKE  ? ;");
			$stmt->bind_param('s', $email);
			$stmt->execute();
			   
			$result = $stmt->get_result();
			return $this->processResult($result);
		}
		catch (Exception $e) {
                echo 'Caught exception: ',  $e->getMessage(), "\n";
        }
	}

	public function uploadPic($email){
		try{
			$conn = $this->DB->connect(); 
		
			$stmt = $conn->prepare("UPDATE users SET checkPic = 1 WHERE Email = ?;");
			$stmt->bind_param('s', $email);
			$stmt->execute();
			   
			$result = $stmt->get_result();
			return $this->processResult($result);
		}
		catch (Exception $e) {
                echo 'Caught exception: ',  $e->getMessage(), "\n";
        }

	}
}

?>