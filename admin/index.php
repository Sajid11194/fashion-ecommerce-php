<?php
global $con;
require("header.php");
require("auth-admin.php");
?>

<div class="container my-5">
    <div class="heading-1 text-center my-3">Admin Options</div>
    <div class="home-menu">
        <a class="home-menu__item" href="add-product.php">Add New Product</a>
        <a class="home-menu__item" href="orders.php">View Customer Orders</a>
    </div>

</div>

<?php include("footer.php");?>
