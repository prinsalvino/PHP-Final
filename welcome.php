<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Home Page</title>
<link href="style.css" rel="stylesheet" type="text/css">
</head>
	<?php
	include "header.php";
	?>
<body class = "welcomebody">
	<h3 class = "rip"> RIP KOBE (1978 - 2020) </h3>
</body>
</html>

<?php
session_start();
if(!isset($_SESSION['email'])){
	header("location: index.php");
}
?>