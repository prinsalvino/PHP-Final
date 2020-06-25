<?php
include_once "UserController.php";
include_once "user.php";
if (isset($_POST["export"])) {
    $controller = new UserController();
    header('Content-Type: text/csv; charset=utf-8');
    header('Content-Disposition: attachment; filename=exportuser.csv');
    // force download  
    header("Content-Type: application/force-download");
    header("Content-Type: application/octet-stream");
    header("Content-Type: application/download");
    
    $output = fopen("php://output","w");
    fputcsv($output, array('Name','Email','BirtDate','Address'));
    $datas = $controller->exportCSV();
    foreach($datas as $data){
        $user = new User();
          $user->name = $data["Name"];
          $user->email = $data["Email"] ;
          $user->birthDate = $data["birthDate"] ;
          $user->address =  $data["address"]  ;
         fputcsv($output, array($user->name,$user->email,$user->birthDate,$user->address));
    } 
    fclose($output);
}
else if(!isset($_SESSION['email'])){
	header("location: index.php");
}
else{
    header("Location: welcome.php");
}

?>