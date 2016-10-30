
<?php
	include_once("Database.php"); 
	$Database = new Database(); // db object
	session_start();
	$productID = $_POST['productID'] ; // string
	$quantity = $_POST['quantity'] ; // int
	$username = $_SESSION['username'];
	// (OrderID, ProductID, CustomerUsername, Quantity)
	$Sql = "INSERT INTO orders VALUES(null,'$productID','$username','$quantity')";
	
	// error handling
	//echo !$Database->query($Sql)?("fail:".$Database->getDb()->error):"succ";
	$Database->query($Sql);
	
	
?>