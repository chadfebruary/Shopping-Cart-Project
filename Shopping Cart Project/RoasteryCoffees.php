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
<div class="txt-heading">Shopping Cart<a id="btnEmpty" href="RoasteryCoffees.php?action=empty">Empty Cart</a></div>

<?php
if(isset($_SESSION["cartItem"])){
	$ItemTotal = 0;
?>

<table cellpadding="10" cellspacing="1">
<tbody>
<tr>
<th><strong>Picture</strong></th>
<th><strong>Name</strong></th>
<th><strong>Description</strong></th>
<th><strong>Weight</strong></th>
<th><strong>Price</strong></th>
</tr>
<?php 
	foreach($_SESSION["cartItem"] as $Item){
		?>
		<tr>
		<td><strong><?php echo $Item["picture"];?></strong></td>
		<td><?php echo $Item["name"];?></td>
		<td><?php echo $Item["description"];?></td>
		<td><?php echo $Item["weight"];?></td>
		<td><?php echo $Item["price"];?></td>
		</tr>
	<?php
		}
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
			<div class="product-item">
				<form method="POST" action="RoasteryCoffees?action=add&code=<?php echo $Row["productID"];?>">
					<div class="product-image"><img src="<?php echo $Row["picture"];?>"></div>
					<div><strong><?php echo $Row["name"];?></strong></div>
					<div><strong><?php echo $Row["description"];?></strong></div>
					<div><strong><?php echo $Row["weight"];?></strong></div>
					<div class="product-price"><?php echo "R".$Row["price"];?></div>
					<div>
						<input type="text" name="quantity" value="1" size="2"/>
						<input type ="submit" value="Add to cart" class="btnAddAction"/>
					</div>
				</form>
			</div>
	<?php }
		}
	?>
</div>
</body>
</html>