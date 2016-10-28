
<?php
	include("Database.php"); 
	$Database = new Database(); // db object
	
	$productID = $_POST['productID'] ; // string
	$quantity = $_POST['quantity'] ; // int
	// (OrderID, ProductID, CustomerUsername, Quantity)
	$Sql = "INSERT INTO orders VALUES(null,'$productID','username',$quantity)";
	
	// error handling
	//echo !$Database->query($Sql)?("fail:".$Database->getDb()->error):"succ";
	echo $Database->query($Sql);
	
	
?>