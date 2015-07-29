<?php

	$productNum = $_GET["productName"];

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
		<div class = "header">
			<p> Title Area </p>
		</div>
		
		<div id='nav'>
			<ul>
				<li class = "detail"><a href = "menu.php">Home</a></li>
			</ul>
		</div>
		
		<div class="content">
			<p> Page Content </p>
			<form action="viewCart.php" method="POST">
				<table>
					<?php
						$query = "select * from INVENTORYITEM where ITEMNUMBER like ".$productNum.";";
						$result = mysql_query($query);
							while ($row = mysql_fetch_assoc($result)) {
							echo "<tr>";
							echo "<td>Product Number:</td> <td>".$row["ITEMNUMBER"]."</td>";
							echo "<td>Product Name:</td> <td>".$row["NAME"]."</td>";
							echo "<td>Price:</td> <td>".$row["UNITPRICE"]."</td>";
							echo "<td>Quantity on Hand:</td> <td>".$row["QTYONHAND"]."</td>";
							echo "</tr>";
						}
					
					?>
					
				</table>
				<input type="number" min="1" max="<?php echo $row["QTYONHAND"]; ?>" value="1" name="qtyOrdered">
				<input type="hidden" name="itemNumber" value="<?php echo $productNum; ?>">
				<input type="submit" value="Add to Cart">
			</form>
		</div>
	</body>
	
</html>