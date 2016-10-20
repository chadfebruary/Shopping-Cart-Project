
<html>
<body>
<link rel= "stylesheet" href = "css/style.css" type="text/css" media="screen" />



<?php
session_start();
 //print_r(get_declared_classes());
$PageTitle="Cart";
//require_once 'Database.php';
include 'head.php';
 
$action = isset($_GET['action']) ? $_GET['action'] : "";
$productID = isset($_GET['productID']) ? $_GET['productID'] : "";
$name = isset($_GET['name']) ? $_GET['name'] : "error";
$name = 'error';
$weight = isset($_GET['weight']) ? $_GET['weight'] : "";
$price = isset($_GET['price']) ? $_GET['price'] : "";
$picture = isset($_GET['picture']) ? $_GET['picture'] : "";

if($action=='removed'){
    echo "<div class='alert alert-info'>";
        echo "<strong>Item was removed successfully.</strong>";
    echo "</div>";
} 
else if($action=='quantityUpdated'){
    echo "<div class='alert alert-info'>";
        echo "<strong>".$name."</strong> quantity was updated!";
    echo "</div>";
}

if(isset($_SESSION["cartItems"]))
{
	if(count($_SESSION['cartItems'])>0){
	 
		// get the product ids
		$productIDs = "";
		foreach($_SESSION['cartItems'] as $productID=>$value){
			$productIDs = $productIDs."'". $productID . "',";
		}
	 //echo $productIDs."\n";
		// remove the last comma
		$productIDs = rtrim($productIDs, ',');
		//echo $productIDs;
		//start table
		echo "<table class='table table-hover table-responsive table-bordered'>";
	 
			// our table heading
			echo "<tr>";
				echo "<th class='textAlignLeft'>Product ID</th>";
				echo "<th>Coffee name</th>";
				echo "<th>Weight</th>";
				echo "<th>Price</th>";
				echo "<th>Picture</th>";
				echo "<th>Action</th>";
			    
				
			echo "</tr>";
	 
			$Sql = "SELECT productID, name, weight, price, picture FROM Inventory WHERE productID IN (".$productIDs.") ORDER BY name";
	 
			$Result = $Database->query($Sql);
			$Number = $Result->num_rows;
	 
			$TotalPrice=0;
			while ($Row = $Result->fetch_assoc()){
				//extract($Row);
	 
				echo "<tr>";
					echo "<td>".$Row['productID']."</td>";
					echo "<td>".$Row['name']."</td>";
					echo "<td>".$Row['weight']."</td>";
					echo "<td>R ".$Row['price']."</td>";
					echo "<td> ".$Row['picture']."</td>";
					echo "<td>";
						echo "<a href='removeFromCart.php?productID=".$productID."&name=".$name."&weight=".$weight."&price=".$price."&picture=".$picture."' class='btn btn-danger'>";
							echo "<span class='glyphicon glyphicon-remove'></span> Remove from cart";
						echo "</a>";
					echo "</td>";
				echo "</tr>";
	 
				$TotalPrice += $price;
			}
	 
			echo "<tr>";
					echo "<td><b>Total</b></td>";
					echo "<td>R ".$TotalPrice."</td>";
					echo "<td>";
						echo "<a href='#' class='btn btn-success'>";
							echo "<span class='glyphicon glyphicon-shopping-cart'></span> Checkout";
						echo "</a>";
					echo "</td>";
				echo "</tr>";
	 
		echo "</table>";
	}
	else{
		echo "<div class='alert alert-danger'>";
			echo "<strong>No products found</strong> in your cart!";
		echo "</div>";
	}
 }
include 'foot.php';
?>
</body>
	</html>