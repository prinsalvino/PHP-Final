<HTML> 
<link href="style.css" rel="stylesheet" type="text/css">
<head>
<meta charset="utf-8">
<title>User List Page</title>
<link href="style.css" rel="stylesheet" type="text/css">
</head>


<?php

if (!isset($_POST["import"])) {
    header("Location: welcome.php");
}
else if(isset($_SESSION['email'])){
	header("location: index.php");
}
else{
    include "header.php";
	include 'AutoLoaderIncl.php';

    $myfile = fopen("user.csv","r") or die ("Unable to find file");
    while(!feof($myfile)){
        foreach (fgetcsv($myfile) as $string) {
        echo "$string ";
    } 
    echo "<br>";
}
fclose($file);
}
?>
</HTML>
