<?php
session_start();
 
$PageTitle="Cart";
include 'head.php';
 
$action = isset($_GET['action']) ? $_GET['action'] : "";
$name = isset($_GET['name']) ? $_GET['name'] : "";
 
if($action=='removed'){
    echo "<div class='alert alert-info'>";
        echo "<strong>{$name}</strong> was removed from your cart!";
    echo "</div>";
}
 
else if($action=='quantityUpdated'){
    echo "<div class='alert alert-info'>";
        echo "<strong>{$name}</strong> quantity was updated!";
    echo "</div>";
}
 
if(count($_SESSION['cartItems'])>0){
 
    // get the product ids
    $productIDs = "";
    foreach($_SESSION['cartItems'] as $id=>$value){
        $productIDs = $productIDs . $id . ",";
    }
 
    // remove the last comma
    $productIDs = rtrim($productIDs, ',');
 
    //start table
    echo "<table class='table table-hover table-responsive table-bordered'>";
 
        // our table heading
        echo "<tr>";
            echo "<th class='textAlignLeft'>Product Name</th>";
            echo "<th>Price</th>";
            echo "<th>Action</th>";
        echo "</tr>";
 
        $Sql = "SELECT productID, name, weight, price FROM Inventory WHERE productID IN ({$productIDs}) ORDER BY name";
 
        $Result = $Database->query($Sql);
        $Number = $Result->num_rows;
 
        $TotalPrice=0;
        while ($Row = $Result->fetch_assoc()){
            //extract($row);
 
            echo "<tr>";
                echo "<td>{$name}</td>";
                echo "<td>&#36;{$price}</td>";
                echo "<td>";
                    echo "<a href='removeFromCart.php?id={$productID}&name={$name}' class='btn btn-danger'>";
                        echo "<span class='glyphicon glyphicon-remove'></span> Remove from cart";
                    echo "</a>";
                echo "</td>";
            echo "</tr>";
 
            $TotalPrice+=$price;
        }
 
        echo "<tr>";
                echo "<td><b>Total</b></td>";
                echo "<td>&#36;{$TotalPrice}</td>";
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
 
include 'foot.php';
?>