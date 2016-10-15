<?php
//session_start();
$PageTitle = "";
?>
<!-- navbar -->
<div class="navbar navbar-default navbar-static-top" role="navigation">
    <div class="container">
 
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="RoasteryCoffees.php">Roastery Coffees</a>
        </div>
 
        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li <?php echo $PageTitle == "Products" ? "class='active'" : ""; ?> >
                    <a href="RoasteryCoffees.php">Products</a>
                </li>
                <li <?php echo $PageTitle == "Cart" ? "class='active'" : ""; ?> >
                    <a href="shoppingCart.php">
                        <?php
                        // count products in cart
                        $cart_count=count($_SESSION['cartItems']);
                        ?>
                        Cart <span class="badge" id="comparison-count"><?php echo $cart_count; ?></span>
                    </a>
                </li>
            </ul>
        </div><!--/.nav-collapse -->
 
    </div>
</div>
<!-- /navbar -->