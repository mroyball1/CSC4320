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
		<div class="header">
			<h3> Title Area </h3>
			<p> <?php echo "Welcome ".$username; ?> </p>
			<form>
				<input type="hidden" name="username">
				<input type="hidden" name="loggedIn">
			</form>
		</div>
		
		<div id='nav'>
			<ul>
				<li class = "detail"><a href = "inventory.php">Search Inventory</a>
				<li class='detail'><a href='profile.php?username=<?php echo $username ?>'><span>Customer Profile</span></a>
				<li class='detail'><a href='login.php'><span>Login</span></a>
				</li>
			</ul>
		</div>
		
		<div class="content">
			<p> Page Content </p>
		</div>
	</body>
	
</html>