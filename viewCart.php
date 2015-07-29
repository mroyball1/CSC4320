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
				
				<?php 
				require_once('../mysqli_connect.php');// connection to database
				
				//creating query for database
				$query = "SELECT NAME, UNITPRICE, QTYONHAND, ITEMNUMBER";
				
				//getting a response from the database and the query 
				$response = @mysqli_query($db, $query);
				
				//check if query executed
				if($response){
					echo '<table align="left"
					cellspacing="5" cellpadding="8"
					
					//printing headers on the table
					<tr><td align="left"><b> NAME</b></td>
					<td align="left"><b> UNITPRICE</b></td>
					<td align="left"><b> QYTONHAND</b></td>
					<td align="left"><b> ITEMNUMBER</b></td>
					</tr>';
					
					//cycle through rows and display table
					//mmysqli_fetch_array returns one row of data until there is no more data
					while($row = mysqli_fetch_array($response)){
						
						echo '<tr><td align="left">' .
						$row['NAME'] . '</td><td align="left">' .
						$row['UNITPRICE'] . '</td><td align="left">' .
						$row['QYTONHAND'] . '</td><td align="left">' .
						$row['ITEMNUMBER'] . '</td><td align="left">';
						
						//close everything
						echo '</tr>';
					}
					echo '</table>';
				} else{  
					echo "Error with database<br />";
					echo mysqli_error($db)
				
				}
				
		//close connection to the database
		mysqli_close($db);
			
			
		
			
			
		
		</div>
	</body>
	
</html>
