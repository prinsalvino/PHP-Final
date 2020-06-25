<?php
include "UserController.php";
session_start();
$user = new UserController();

$email = $_SESSION["email"];

    $file= $_FILES['file'];
    $fileName = $_FILES['file']['name'];
    $fileTmp = $_FILES['file']['tmp_name'];
    $fileSize = $_FILES['file']['size'];
    $filesError = $_FILES['file']['error'];
    $fileType = $_FILES['file']['type'];

    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));
    $allowed = array('jpg','jpeg','png');
    if(in_array($fileActualExt,$allowed)){
        if($filesError ===  0){
            if($_FILES['file']['size'] < 1000000){            
                $fileNameNew = $email.".".$fileActualExt;
                $fileDestination = 'uploads/'.$fileNameNew;
                move_uploaded_file($fileTmp,$fileDestination);
                $user->uploadPic($email);
                header("Location: welcome.php?uploadsucess");
            }else{
                echo "Your file is too big!";
            }
        }else{
            echo "You have an error uploading your file!";
        }
    }else{
        echo "You cannot upload files of this type!";
    }
?>