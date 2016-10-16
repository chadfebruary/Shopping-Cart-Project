<?php
	session_start();
	//require_once("../Database.php");
	//define('__ROOT__', dirname(dirname(__FILE__)));
	//require_once (__ROOT__.'\Shopping Cart Project\Database.php');
	
	//include dirname(__FILE__)."\Database.php";
	//require_once("Database.php"); 
	//$Database = new Database();
	
	
	$PageTitle = "Coffees";
	include "head.php";
	
	$productID = isset($_GET['productID']) ? $_GET['productID'] : "";
	$action = isset($_GET['action']) ? $_GET['action'] : "";
	$name = isset($_GET['name']) ? $_GET['name'] : "";
	$weight = isset($_GET['weight']) ? $_GET['weight'] : "";
	$price = isset($_GET['price']) ? $_GET['price'] : "";
	
	if($action == "added")
	{
		echo "<div class='alert alert-info'>";
        echo "<strong>".$name."</strong> added to your cart successfully.";
		echo "</div>";
	}
	if($action == "exists")
	{
		echo "<div class='alert alert-info'>";
        echo "<strong>".$name."</strong> has already been added to your cart.";
		echo "</div>";
	}
	$Sql = "SELECT name, productID, weight, price FROM Inventory ORDER BY name";
	//$Statement = $Database->prepare($Sql);
	//$Statement->execute();
	$Result = $Database->query($Sql);
	$Number = $Result->num_rows;
	
	if($Number > 0)
	{
		echo "<table class='table table-hover table-responsive table-bordered'>";
	 
			echo "<tr>";
				echo "<th class='textAlignLeft'>Product ID</th>";
				echo "<th>Coffee name</th>";
				echo "<th>Weight</th>";
				echo "<th>Price</th>";
				echo "<th>Action</th>";
			echo "</tr>";
	 
			while ($Row = $Result->fetch_assoc()){
				//extract($row);
	 
				echo "<tr>";
					echo "<td><div class='productID'>".$Row['productID']."</div></td>";
					echo "<td><div class='name'>".$Row['name']."</div></td>";
					echo "<td><div class='weight'>".$Row["weight"]."</div></td>";
					echo "<td><div class='price'>R ".$Row["price"]."</div></td>";
					echo "<td>";
						echo "<a href='addToCart.php?productID=".$Row['productID']."&name=".$Row['name']."&weight=".$Row['weight']."&price=".$Row['price']."' class='btn btn-primary'>";
							echo "<span class='glyphicon glyphicon-shopping-cart'></span> Add item to cart";
						echo "</a>";
					echo "</td>";
				echo "</tr>";
			}
	 
		echo "</table>";
	}
	else
	{
		echo "No products were found.";
	}
	
	include "foot.php";
?>
<?PHP
	/*if(!empty($_GET["action"]))
	{	
		switch($_GET["action"])
		{
			case "add":
				if(!empty($_POST["quantity"]))
				{
					$ProductByID = $Database->query("SELECT Name, ProductID, Quantity, Weight FROM Inventory WHERE ProductID='".$_GET["productID"]."'");
					//$ProductArray = array($ProductByID[0]["productID"]=>array('name'=>$ProductByID[0]["name"], 'weight'=>$ProductByID[0]["weight"], 'price'=>$ProductByID[0]["price"]));
					$ProductArray = array();
					while($Row = $ProductByID->fetch_assoc())
					{
						$ProductArray = $Row;
						echo $Row["name"];
					}
					if(!empty($_SESSION["cartItem"]))
					{
						if(in_array($ProductArray, $_SESSION["cartItem"]))
						{
							foreach($_SESSION["cartItem"] as $Key=>$Value)
							{
								if($ProductByID[0]["productID"] == $Key)
								{
									$_SESSION["cartItem"][$Key]["quantity"] = $_POST["quantity"];
								}
							}
						}
						else
						{
							$_SESSION["cartItem"] = array_merge($_SESSION["cartItem"], $ProductArray);
						}
					}
					else
					{
						$_SESSION["cartItem"] = $ProductArray;
					}
				}
			break;
			case "remove":
				if(!empty($_SESSION["cartItem"]))
				{
					foreach($_SESSION["cartItem"] as $Key=>$Value)
					{
						if($_GET["productID"] == $Key)
						{
							unset($_SESSION["cartItem"][$Key]);
						}
						if(empty($_SESSION["cartItem"]))
						{
							unset($_SESSION["cartItem"]);
						}
					}
				}
			break;
			case "empty":
				unset($_SESSION["cartItem"]);
			break;
		}
	}*/
/*
<html>
<head>
<title> Roastery's  Coffee </title>
<link rel= "stylesheet" href = "style.css" type="text/css" media="screen" />
</head>
<body>
<div id="shoppingCart">
<div class="txt-heading">Roastery's Coffee<a id="btnEmpty" href="RoasteryCoffees.php?action=empty">Empty Cart</a></div>
*/
/*if(isset($_SESSION["cartItem"])){
	$ItemTotal = 0;
?>

<table cellpadding="10" cellspacing="1">
<tbody>
<tr>
<th><strong>Name</strong></th>
<th><strong>Product ID</th>
<th><strong>Quantity</th>
<th><strong>Weight</strong></th>
<th><strong>Price</strong></th>
<th><strong>Remove</strong></th>
</tr>
<?php 
	foreach($_SESSION["cartItem"] as $Item){
		?>
		<tr>
		<td><strong><?php echo $Item["name"];?></strong></td>
		<td><?php echo $Item["productID"];?></td>
		<td><?php echo $Item["quantity"];?></td>
		<td><?php echo $Item["weight"];?></td>
		<td><?php echo $Item["price"];?></td>
		<td><a href="RoasteryCoffees.php?action=remove&productID=<?php echo $Item["productID"];?>" class="btnRemove">Remove</a></td>
		</tr>
	<?php
	$ItemTotal += ($Item["price"] * $Item["quantity"]);	}
	?>
<tr>
<td colspan="5" align=right><strong>Total:</strong><?php echo "R".$ItemTotal;?></td>
</tr>
</tbody>
</table>
<?php
	}
	else{
		echo "Empty cart";
	}
?>
</div>

<div id="productList">
	<div class="txt-heading">Products</div>
	<?php
		$ProductList = $Database->query("SELECT * FROM Inventory");
		//$ProductListArray = $ProductList->fetch_assoc();
		if(!empty($ProductList)){
			while($Row = $ProductList->fetch_assoc()){
		?>
			<div class="product-item">
				<form method="POST" action="RoasteryCoffees.php?action=add&productID=<?php echo $Row["productID"];?>">
					<div class="product-image"><img src="<?php echo $Row["picture"];?>"></div>
					<div><strong><?php echo $Row["name"];?></strong></div>
					<div><strong><?php echo $Row["weight"];?></strong></div>
					<div class="product-price"><?php echo "R".$Row["price"];?></div>
					<div>
						<input type="text" name="quantity" value="1" size="2"/>
						<input type ="submit" value="Add to cart" class="btnAddAction"/>
					</div>
				</form>
			</div>
	<?php }
		}*/
	?>