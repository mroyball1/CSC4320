<?php

    session_start();
include_once("includes/functions.php");

    //database connection
    include_once("includes/connection.php");
	
	$cuName = $_POST["username"];
	$lineItem = $_POST["itemNumber"];
	
	//GET LINE ITEM TOTAL (QTY * PRICE);
	$query = "select UNITPRICE from INVENTORYITEM where ITEMNUMBER = ".$lineItem.";";
	$result = mysql_query($query);
	while ($row = mysql_fetch_assoc($result)) {
		$lineTotal = $row["UNITPRICE"] * $_POST["qtyOrdered"];;
	}
	
	//CONVERT USERNAME TO CUSTOMERNUMBER
	$query = "select CUSTOMERNUMBER from USER where USERNAME like '".$cuName."';";
	$result = mysql_query($query);
	while ($row = mysql_fetch_assoc($result)) {
		$cuNumber = $row["CUSTOMERNUMBER"];
	}
	
	//EITHER FIND A PENDING ORDER OR START A NEW ORDER FOR A CU
	$query = "select STATUS, ORDERNUMBER from USER as U inner join ORDERS O on U.CUSTOMERNUMBER = O.CUSTOMERNUMBER where U.CUSTOMERNUMBER = ".$cuNumber.";";
	$test = $query;
	$result = mysql_query($query);
	while ($row = mysql_fetch_assoc($result)) {
		if ($row["STATUS"] = "PENDING") {
			$orderNumb = $row["ORDERNUMBER"];
			
		}
	}
	if(!isset($orderNumb)) {
		//NEED TO CONVERT USERNAME TO CUSTOMER NUMBER FIRST
		$query = "insert into ORDERS (CUSTOMERNUMBER, STATUS) values (".$cuNumber.", \"PENDING\");";
		$result = mysql_query($query);
		$query = "select STATUS, ORDERNUMBER from USER as U inner join ORDERS O on U.CUSTOMERNUMBER = O.CUSTOMERNUMBER where U.CUSTOMERNUMBER = ".$cuNumber.";";
		$result = mysql_query($query);
		while ($row = mysql_fetch_assoc($result)) {
			$orderNumb = $row["ORDERNUMBER"];
		}
	}
	
	//ADD PREVIOUS ITEM TO ORDER
	$query = "insert into LINEITEM values (".$orderNumb.", ".$lineItem.", ".$_POST["qtyOrdered"].", ".$lineTotal.");";
	$result = mysql_query($query);
	
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
				<li class = "detail"><a href = "inventory.php?username=<?php echo $cuName; ?>"> Search Inventory </a> </li>
			</ul>
		</div>
		
		<div class="content">
			<p> Shopping Cart </p>
			<table>
				<tr>
					<th>Item</th>
					<th>Quantity</th>
					<th>Line Total</th>
				</tr>
				
				<?php
					
					$query = "select I.NAME, L.QTYORDERED, L.LINEPRICE from INVENTORYITEM as I inner join LINEITEM L on I.ITEMNUMBER = L.ITEMNUMBER where L.ORDERNUMBER = ".$orderNumb.";";
					$result = mysql_query($query);
						while ($row = mysql_fetch_assoc($result)) {
							echo "<tr>";
							echo "<td>".$row["NAME"]."</td>";
							echo "<td>".$row["QTYORDERED"]."</td>";
							echo "<td>".$row["LINEPRICE"]."</td>";							
							echo "</tr>";
						}
				?>
				
			</table>
			
			<br>
			<form action="checkout.php" method="POST">
				<input type="hidden" name="cuNumber" value=<?php echo $cuNumber ?> >
				<input type="hidden" name="orderNumber" value=<?php echo $orderNumb ?> >
				<input type="submit" value="Checkout">
			</form>

		</div>
	</body>
	
</html>
