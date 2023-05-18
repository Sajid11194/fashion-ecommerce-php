<?php
global $con;
require("header.php");
?>
<?php

if (isset($_GET["search"])) {
    $search = $_GET["search"];
    $title = "Search Results : $search";
    $sql = "SELECT * FROM `products` WHERE name like '%$search%'";
} elseif (isset($_GET["category"])) {
    $category = $_GET["category"];
    $title = "$category";
    $sql = "SELECT * FROM `products` WHERE categories like '%$category%'";
} else {
    $title = "Shop";
    $sql = "SELECT * FROM `products` WHERE 1";
}
$query = $con->prepare($sql);
$query->execute();
$products = $query->fetchAll();

?>
<div class="container mt-5">
    <span class="heading-1 text-center my-5 "><?php echo $title; ?></span>
    <?php if (!count($products)) {
        echo '<div class="text-center">No Products to Show</div>';
    }
    ?>
    <div class="row row-cols-lg-4 row-cols-1 gy-4">
        <?php

        foreach ($products as $product) {
            echo "<div class=\"col\">
            <div class=\"product-list__item text-center\">
                <a href=\"/product-view.php?id={$product["product_id"]}\"><img class=\"img-fluid product-list__item__img\" src=\"./img/product2.png\" alt=\"\"></a>
                <span class=\"product-list__item--name\">{$product["name"]}</span>
                <span class=\"product-list__item--price\">Tk {$product["price"]}</span>
                <div class=\"\">
                    <a href=\"/product-view.php?id={$product["product_id"]}\" class=\"btn d-block mt-2\">
                        <i class=\"lni lni-cart\"></i>
                        Add to Cart
                    </a>
                </div>
            </div>
        </div>";
        }

        ?>

    </div>
</div>
