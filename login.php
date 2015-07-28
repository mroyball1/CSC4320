<?php
	$db = "mroyball1";
	
	if(isset($_POST["username"]) {
		$conn = mysql_connect("localhost", "mroyball1", "mroyball1") or die("cannot connect");
		mysql_select_db($db) or die("cannot select DB");
		
		//validate that the given username/password is in our database
		//if wrong go back to this page otherwise go back to menu.php
		
	}

?>


<!DOCTYPE html>
<html>
	<head>
		<title>Project 3</title>
		<link rel="stylesheet" type="text/css" href="style.css" />
	</head>
	
	<body>
		<div id="header">
			<p> Title Area </p>
		</div>
		
		<div id="nav">
			<p> Navigation Bar </p>

		</div>
		
		<div id="content">
			<p> Page Content </p>
			<form action="login.php" method="POST">
				<table>
					<tr>
						<td>Enter Username: </td>
						<td> <input type="text" name="username"> </td>
					</tr>
					<tr>
						<td>Enter Password: </td>
						<td> <input type="text" name="password"> </td>
					</tr>
				</table>
				<br>
				<input type="submit" value="Submit">
			</form>
		</div>
	</body>
	
</html>