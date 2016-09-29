<?php
include("Database.php");
$Database = new Database();
class CoffeeShop
{
	function loadMenu()
	{
		/*$Sql = "SELECT * FROM Menu";
		$QueryResult = $Database->query($Sql);
		if($QueryResult === true)
		{
			$Menu = array();
			while($Row = $QueryResult->fetch_assoc())
			{
				$Menu[$Row['MenuID']] = array();
				$Menu[$Row['MenuID']]['ItemName'] = $Row['ItemName'];
				$Menu[$Row['MenuID']]['ItemPrice'] = $Row['ItemPrice'];
				$Menu[$Row['MenuID']]['Quantity'] = $Row['Quantity'];
				$Menu[$Row['MenuID']]['Description'] = $Row['Description'];
			}
		}*/
	$retval = FALSE;
	$subtotal = 0;

	
	echo"<table width= '100%'>\n";
	echo"<tr><th>Product</th><th>Description</th>"."<th>Price Each</th><th># in Cart</th>" ."<th>Total Price</th><th>&nbsp;</th></tr>\n";
	
	foreach($this->inventory as $ID => $Info)
	{
		echo "<tr><td>".
		htmlentities($Info['name'])."</td>\n";
		echo "<td>".htmlentities($Info['description'])."</td>\n";
		printf("<td class= 'currency'>$%.2f</td>\n", $Info['price']);
		echo "<td class= 'currency'>".$this->shoppingCart[$ID]."</td>\n";
		printf("<td class= 'currency'>$%.2f</td>\n", $Info['price'] * $this->shoppingCart[$ID]);
		echo "<td><a href='" .$_SERVER['SCRIPT_NAME'] ."?PHPSESSID=" . session_id() ."&ItemToAdd=$ID'>Add " ." Item</a><br />\n";
		echo "<a href='" . $_SERVER['SCRIPT_NAME']."?PHPSESSID=" . session_id() ."&ItemToRemove=$ID'>Remove " ." Item</a></td>\n";
		$subtotal += ($Info['price'] * $this->shoppingCart[$ID]); 
	}
	echo "<tr><td colspan= '4'>Subtotal</td>\n";
	printf("<td class= 'currency'>$%.2f</td>\n", $subtotal);
	echo "<td><a href='" .$_SERVER['SCRIPT_NAME'] ."?PHPSESSID=" . session_id() ."&EmptyCart=TRUE'>Empty "." Cart</a></td></tr>\n";
	echo"</table>";
	$retval = TRUE; 
	
	return($retval);
	}
}
?>