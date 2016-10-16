<?php
session_start();
 
// get the product id
$productID = isset($_GET['productID']) ? $_GET['productID'] : "";
$name = isset($_GET['name']) ? $_GET['name'] : "";
echo "test";
//$weight = isset($_GET['weight']) ? $_GET['name'] : "";
//$price = isset($_GET['price']) ? $_GET['price'] : "";

// remove the item from the array
unset($_SESSION['cartItems'][$productID]);
 
// redirect to product list and tell the user it was added to cart
header('Location: shoppingCart.php?action=removed&productID=' .$productID.'&name='.$name);
?>