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
		
		<div id="nav">
			<ul>
				<li class = "detail"><a href = "menu.php">Home</a></li>
				<li class = "detail"><a href="login.php">Customer Log In </a> </li>
			</ul>
		</div>
		
		<div class="content">
			<p> Item Details </p>
			<form action="viewCart.php" method="POST">
				<table>
					<?php
						$query = "select * from INVENTORYITEM where ITEMNUMBER like ".$productNum.";";
						$result = mysql_query($query);
							while ($row = mysql_fetch_assoc($result)) {
							echo "<tr>";
							echo "<td>Product Number:</td> <td>".$row["ITEMNUMBER"]."</td></tr>";
							echo "<tr><td>Product Name:</td> <td>".$row["NAME"]."</td></tr>";
							echo "<tr><td>Price:</td> <td>".$row["UNITPRICE"]."</td></tr>";
							echo "<tr><td>Quantity on Hand:</td> <td>".$row["QTYONHAND"]."</td></tr>";
							echo "</tr>";
							$qtyAvailable = $row["QTYONHAND"];
							
						}
					
					?>
					
				</table>
				<input type="number" min="1" max="<?php echo $qtyAvailable; ?>" value="1" name="qtyOrdered">
				<input type="hidden" name="itemNumber" value=<?php echo $productNum; ?>>
				<input type="hidden" name="username" value=<?php echo $_GET["username"]; ?> >
				<input type="submit" value="Add to Cart">
			</form>
		</div>
	</body>
	
</html>