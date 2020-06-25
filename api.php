<?php
include 'AutoLoaderIncl.php';
class API{
    function Select(){
        $UserController =  new UserController();
        $users = $UserController->getAllUser();
        echo json_encode($users);
    }
}
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
$API = new API();
http_response_code(200);
$API->Select();

?>  