
<?php
	include("Database.php"); 
	$Database = new Database(); // db object
	session_start();
	//include 'authentication.php';
	$username = $_SESSION['username'];
	$productID = $_POST['productID'] ; // string
	$quantity = $_POST['quantity'] ; // int
	// (OrderID, ProductID, CustomerUsername, Quantity)
	$Sql = "INSERT INTO orders VALUES(null,'$productID','$username','$quantity')";
	//var_dump($Sql);
	// error handling
	//echo !$Database->query($Sql)?("fail:".$Database->getDb()->error):"succ";
	echo $Database->query($Sql);
	
	
?>