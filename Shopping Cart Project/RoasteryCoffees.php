<?php
	session_start();
	require_once("Database.php");
	$Database = new Database();
	
	if(!empty($_POST["action"]))
	{	
		switch($_POST["action"])
		{
			case "add":
				if(!empty($_POST["quantity"]))
				{
					$ProductByID = $Database->query("SELECT * FROM Inventory WHERE ProductID='".$_POST["productID"]."'");
					$ProductArray = array($ProductByID[0]["productID"]=>array('picture'=>$ProductByID[0]["picture"],'name'=>$ProductByID[0]["name"], 'description'=>$ProductByID[0]["description"], 'price'=>$ProductByID[0]["price"]));
					
					if(!empty($_SESSION["cartItem"]))
					{
						
					}
				}
			break;
			case "remove":
				if(!empty($_SESSION["cartItem"]))
				{
					
				}
			break;
			case "empty":
				unset($_SESSION["cartItem"]);
			break;
		}
	}
?>
<html>
<head>
<title> Roastery's  Coffee </title>
</head>

<body>
<h1> Roastery's Coffee </h1>
<h2> Description goes here</h2>

<p>Welcome message goes here </p>
<div id="shoppingCart">
<div class=="txt-heading">Shopping Cart<a id="btnEmpty" href="RoasteryCoffees.php?action=empty">Empty Cart</a></div>

<?php
if(isset($_SESSION["cartItem"])){
?>

<table cellpadding="10" cellspacing="1">
<tbody>
<tr>
<th><strong>Product</strong></th>
<th><strong>Name</strong></th>
<th><strong>Description</strong></th>
<th><strong>Price</strong></th>
</tr>
<?php 
	foreach($_SESSION["cartItem"] as $Item)
	{
		?>
		<tr>
		<td><strong><?php echo $Item["Picture"];?></strong></td>
		<td><?php echo $Item["Name"];?></td>
		<td><?php echo $Item["Description"];?></td>
		<td><?php echo $Item["Weight"];?></td>
		<td><?php echo $Item["Price"];?></td>
		</tr>
	<?php
		}
	?>
	<?php
	/*if (count($ErrorMsgs) == 0){
		$SQLString = "SELECT * FROM inventory WHERE storeID = 'COFFEE'";
		$QueryResult = $DBConnection->query($SQLString);
		
		if($QueryResult === FALSE){
			$ErrorMsgs[] = "Query was not completed succesfully"." Error code ".$DBConnection->errno.": ".$DBConnection->error;
		}
		else{
			echo "<table width = '100%'>\n";
			echo "<tr><th>Product</th> <th>Description</th> <th>Price for each</th></tr>\n";
			
			while (($Row = $QueryResult->fetch_assoc()) !== NULL){
				echo "<tr><td>".htmlentities($Row['name'])."</td>\n";
				echo "<td>".htmlentities($Row['description'])."</td>\n";
				printf("<td>$%.2f</td></tr>\n", $Row['price']);
			}
			
			echo "</table>";
	}
	}
	
	if (count($ErrorMsgs)){
		foreach ($ErrorMsgs as $Msg){
			echo "<p>".$Msg."</p>";
		}*/
	?>
</tbody>
</table>
<?php
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
			<?/*<div class="product-item">
			<form method="POST" action="RoasteryCoffees?action=add&code=<?php echo $ProductListArray[$Key]["productID"];?>">
			<div class="product-image"><img src="<?php echo $ProductListArray[$Key]["picture"];?>"></div>
			<div><strong><?php echo $ProductListArray[$Key]["name"];?></strong></div>
			<div><strong><?php echo $ProductListArray[$Key]["description"];?></strong></div>
			<div class="product-price"><?php echo "R".$ProductArray[$Key]["price"];?></div>
			<div>
				<input type="text" name="quantity" value="1" size="2"/>
				<input type ="submit" value="Add to cart" class="btnAddAction"/>
			</div>
			</form>
			</div>*/
			?>
			<div class="product-item">
			<form method="POST" action="RoasteryCoffees?action=add&code=<?php echo $Row["productID"];?>">
			<div class="product-image"><img src="<?php echo $Key["picture"];?>"></div>
			<div><strong><?php echo $Key["name"];?></strong></div>
			<div><strong><?php echo $Key["description"];?></strong></div>
			<div><strong><?php echo $Key["weight"];?></strong></div>
			<div class="product-price"><?php echo "R".$Key["price"];?></div>
			<div>
				<input type="text" name="quantity" value="1" size="2"/>
				<input type ="submit" value="Add to cart" class="btnAddAction"/>
			</div>
			</form>
			</div>
	<?php } ?>
</div>
</body>
</html>