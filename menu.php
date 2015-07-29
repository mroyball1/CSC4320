<?php
	//Page Setup
	if(isset($_GET['username'])) {
		$username = $_GET['username'];
	} else {
		$username = "";
	}
	//End Page Setup
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
			<p> <?php echo "Welcome ".$username; ?> </p>
			<form>
				<input type="hidden" name="username">
				<input type="hidden" name="loggedIn">
			</form>
		</div>
		
		<div id="nav">
			<p> Navigation Bar </p> <br>
			<a href="inventory.php<?php if(isset($username)) echo "?username=".$username; ?>"> Search Inventory </a> <br><br>
			<a href="login.php">Customer Log In </a> <br><br>
			<a href="profile.php?username=<?php echo $username ?>"> Customer Profile </a>
		</div>
		
		<div id="content">
			<p> Page Content </p>
		</div>
	</body>
	
</html>