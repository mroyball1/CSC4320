<?php
	//Page setup
	$errorMessageType = "hidden";
	$errorMessageValue = "";
	//End page setup

	$db = "mroyball1";
	
	if(isset($_POST["username"])) {
		$conn = mysql_connect("localhost", "mroyball1", "mroyball1") or die("cannot connect");
		mysql_select_db($db) or die("cannot select DB");
		
		//validate that the given username/password is in our database
		//if wrong go back to this page otherwise go back to menu.php
		
		//get list of usernames from DB and compare it to 'username'
		$getUsernames = "select USERNAME, PASSWORD from USER;";
		$result = mysql_query($getUsernames);
		
			while ($row = mysqli_fetch_assoc($result)) {
				//check each item in the list if it matches with the provided username
				if ($row["USERNAME"] == $_POST["username"]) {
					//if so check the password
					if ($row["PASSWORD"] == $_POST["password"]) {
						//go to home page... how?
						$errorMessageType = "text";
						$errorMessageValue = "success";
					} else {
						//password doesn't match
						$errorMessageType = "text";
						$errorMessageValue = "password incorrect";
					}
				} else {
					//no match
					$errorMessageType = "text";
					$errorMessageValue = "user not found";
					
				}
			}
		
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
			<a href="menu.php"> Home </a>

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
				<input type="<?php echo $errorMessageType; ?>" name="errorMessage" value="<?php echo $errorMessageValue; ?>">
				<br>
				<input type="submit" value="Submit">
			</form>
		</div>
	</body>
	
</html>