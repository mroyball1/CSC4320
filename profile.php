<?php

    session_start();

    //redirect to the login if an unauthenticated user tries to access the profile page
    if (!isset($_SESSION['username'])) {
        redirectTo("login.php");
    }

    include_once("includes/functions.php");

	//need a check to see if a username is passed, otherwise redirect to login.php
	/*
	if($_GET['username'] == "") {
		header("Location: login.php" );
		exit;
	}	
	*/
	if(isset($_GET['username'])) {
		$passedUser = $_GET['username'];
	}

    //database connection
    include_once("includes/connection.php");
	
	//update database if called from a previous instance of profile.php
	if(isset($_POST["newUsername"])) {
		$updateQuery = "update USER set USERNAME = '".$_POST["newUsername"]."' where USERNAME like '".$_POST["originalUsername"]."';";
		$result = mysql_query($updateQuery);
		$updateQuery = "update USER set BILLTO = '".$_POST["newBillto"]."' where USERNAME like '".$_POST["originalUsername"]."';";
		$result = mysql_query($updateQuery);
		$updateQuery = "update USER set NAME = '".$_POST["newName"]."' where USERNAME like '".$_POST["originalUsername"]."';";
		$result = mysql_query($updateQuery);
		$updateQuery = "update USER set PASSWORD = '".$_POST["newPassword"]."' where USERNAME like '".$_POST["originalUsername"]."';";
		$result = mysql_query($updateQuery);
		$passedUser = $_POST['originalUsername'];
	}
	
	
	//populate form to update
	$query = "select NAME, BILLTO, USERNAME, PASSWORD from USER where USERNAME like '".$passedUser."';";
	$result = mysql_query($query);
	
	while ($row = mysql_fetch_assoc($result)) {
		$name = $row["NAME"];
		$billto = $row["BILLTO"];
		$username = $row["USERNAME"];
		$password = $row["PASSWORD"];
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
		</div>
		
		<div id="nav">
			<ul>
				<li class = "detail"><a href = "menu.php">Home</a></li>
			</ul>
		</div>
		
		<div class="content">
			<p> Page Content </p>
			<form action="profile.php" method="POST">
				Update Customer Information: <br> <br>
				<table>
					<tr>
						<td>Customer Name:</td><td> <input type="text" name="newName" value=<?php echo $name ?>> </td>
					</tr>
					<tr>
						<td>Billing Address:</td><td> <input type="text" name="newBillto" value=<?php echo $billto ?>> </td>
					</tr>
					<tr>
						<td>Username:</td><td> <input type="text" name="newUsername" value=<?php echo $username ?>> </td>
					</tr>
					<tr>
						<td>Password:</td><td> <input type="text" name="newPassword" value=<?php echo $password ?>> </td>
					</tr>
				</table>
				
				<br>
				<input type="hidden" value=<?php echo $passedUser ?> name="originalUsername">
				<input type="submit" value="Update Info">
			</form>
		</div>
	</body>
	
</html>