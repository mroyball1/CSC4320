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
			<a href="menu.php"> Home </a> <br><br>
			<a href="login.php">Customer Log In </a> <br><br>
		</div>
		
		<div id="content">
			<p> Page Content </p>
			<table>
				<tr>
					<th>Description </th>
					<th>Price</th>
					<th>Quantity on Hand</th>
				</tr>
				
				<?php
				$query = "select * from INVENTORYITEM;";
				$result = mysql_query($query);
				while ($row = mysql_fetch_assoc($result)) {
					echo "<tr>";
					echo "<td><a href='addToCart.php?productName=\"".$row["ITEMNUMBER"]."\"'>".$row["NAME"]."</a></td>";
					echo "<td>".$row["UNITPRICE"]."</td>";
					echo "<td>".$row["QTYONHAND"]."</td>";
					echo "</tr>";
				}
			
				
				?>
				<input type="hidden" name="username" value="<?php if(isset($_GET["username"])) echo $_GET["username"]; ?>">
			</table>
		</div>
	</body>
	
</html>