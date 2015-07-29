<?php

    session_start();
    include_once("includes/functions.php");

	//Page Setup
	if(isset($_GET['username'])) {
		$username = $_GET['username'];
	} else {
		$username = "";
	}
	//End Page Setup

    //database connection
    include_once("includes/connection.php");
	
	//CHECK FOR PAYMENT AND CHANGE DATABASE
	if(isset($_POST["CCnumber"])) {
		$query = "update ORDERS set STATUS=\"ORDERED\" where ORDERNUMBER = ".$_POST["orderNumber"].";";
		$result = mysql_query($query);
	}
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Project 3</title>
		<link rel="stylesheet" type="text/css" href="style.css" />
	</head>
	
	<body>
		<div class="header">
			<p> Title Area </p>
			<p> <?php echo "Welcome ".$username; ?> </p>
			<form>
				<input type="hidden" name="username">
				<input type="hidden" name="loggedIn">
			</form>
		</div>
		
		<div id="nav">
			<ul>
				<li class = "detail"><a href="inventory.php<?php if(isset($username)) echo "?username=".$username; ?>"> Search Inventory </a></li>
				<li class='detail'><a href='profile.php?username=<?php echo $username ?>'><span>Customer Profile</span></a> </li>
				<li class='detail'><a href='login.php'><span>Login</span></a></li>
			</ul>
		</div>
		
		<div class="content">
			<p> Page Content </p>
		</div>
	</body>
	
</html>