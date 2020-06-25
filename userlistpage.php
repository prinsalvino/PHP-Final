<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>User List Page</title>
<link href="style.css" rel="stylesheet" type="text/css">
</head>
	<?php
	include "header.php";
	?>
<body class = "welcomebody">
	<h3 class = "titleforPage">User List</h3>
	<div class = "List">
	<form method = "POST" action="exportCSV.php">
		<input type="submit" name="export" value = "csvexport" class = "btn">
	</form>

	<form method = "POST" action="importCSV.php">
		<input type="submit" name="import" value = "See Import from CSV" class = "btn">
	</form>
		<?php
		
		include 'AutoLoaderIncl.php';
		$user = new UserController();
		
		if(isset($_GET["searchemail"])){
			$user->showUserByEmail($_GET["email"]);	
		}
		else if(isset($_GET["searchname"])){	
			$user->showUserByName($_GET["name"]);
		}
		else{
			$user->showAllUser();
		}
		?>
	</div>
	
	<div class = "Search">
		<h4> Search User </h4>
		 <form class = "searchbox" action="userlistpage.php" method="GET">
            Email: <input class = "textboxsearchemail" type="text" placeholder = "email" name="email"><br>
            <input class = "btnsearch" type="submit" name = "searchemail" value = "search">
			
        </form>
	<br>
<br>

		 <form class = "searchbox" action="userlistpage.php" method="GET">
            Name: <input class = "textboxsearchemail" type="text" placeholder = "name" name="name"><br>
            <input class = "btnsearch" type="submit" name = "searchname" value = "search">
		
        </form>

		
		<br>
			<?php
			if(isset($_GET["searchemail"]) || isset($_GET["searchname"])){
			?><br> <a href = "http://622796.infhaarlem.nl/userlistpage.php">See Full List</a> <?php 
			}
			?>
	</div>
</body>
</html>

<?php
session_start();
if(!isset($_SESSION['email'])){
	header("location: index.php");
}
?>

