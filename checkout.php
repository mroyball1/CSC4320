<?php

    session_start();
include_once("includes/functions.php");

	$orderNumber = $_POST["orderNumber"];
	$customerNumber = $_POST["cuNumber"];

    //database connection
    include_once("includes/connection.php");


	$query = "select sum(LINEPRICE) from LINEITEM where ORDERNUMBER = ".$orderNumber.";";
	$result = mysql_query($query);
	while ($row = mysql_fetch_assoc($result)) {
		$totalPrice = $row["sum(LINEPRICE)"];
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
			<p> Checkout </p>
			<p>Your total is: $<?php echo $totalPrice; ?> </p>
			
			<form action="menu.php" method="POST">
				<table>
					<tr>
						<td>Enter Credit Card Number: </td>
						<td><input type="text" name="CCnumber"></td>
					</tr>
					<tr>
						<td>Enter CCV: </td>
						<td><input type="text" name="CCV"></td>
					</tr>
					<tr>
						<td>Enter Billing Zip Code:</td>
						<td><input type="text" name="billZip"></td>
					</tr>
				</table>
				<input type="hidden" name="orderNumber" value=<?php echo $orderNumber ?>>
				<input type="submit" value="Confirm Order">
			</form>
		</div>
	</body>
	
</html>
