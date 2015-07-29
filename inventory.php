<?php

    session_start();
    include_once("includes/functions.php");

    //database connection
    include_once("includes/connection.php");
	
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
				<li class = "detail"><a href="login.php">Customer Log In </a> </li>
			</ul>
		</div>
		
		<div class="content">
			<table>
				<tr>
					<th>Description </th>
					<th>Price</th>
				</tr>
				
				<?php
				$query = "select * from INVENTORYITEM;";
				$result = mysql_query($query);
				while ($row = mysql_fetch_assoc($result)) {
					echo "<tr>";
					echo "<td><a href='addToCart.php?productName=\"".$row["ITEMNUMBER"]."\"&username=\"".$_GET["username"]."\"'>".$row["NAME"]."</a></td>";
					echo "<td>".$row["UNITPRICE"]."</td>";
					//echo "<td>".$row["QTYONHAND"]."</td>";
					echo "</tr>";
				}
			
				
				?>
				
			</table>
			
		</div>
	</body>
	
</html>