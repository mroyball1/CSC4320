<?php
	
	$db = "mroyball1";
	$conn = mysql_connect("localhost", "mroyball1", "mroyball1") or die("cannot connect");
	mysql_select_db($db) or die("cannot select DB");
	
	
	
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
			
			<table>
				<tr>
					<th> Cart List</th>
					<th> Price </th>
				</tr>
				
				<?php 
				session_start();
				include_once("config.php")
				
				if(isset($_SESSION['order'])){
					$_SESSION['order'] = array();
					
				}
				
				
				
				if(isset($_GET['order'])){
					$order = array();
					$total = 0;
					
				}
				
				
				
			</table>
			
			
		
			
			
		
		</div>
	</body>
	
</html>
