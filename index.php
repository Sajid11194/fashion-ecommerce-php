<?php
require("header.php");
?>
<?php
$products = get_products();
?>

<div class="banner banner--1">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-8">
            <h1 class="banner__content__heading">The Best Fashion Collection</h1>
            <h6 class="banner__content__text">The best fashion shop in the world</h6>
            <a href="products.php" class="btn">View Collection</a>
            </div>
            <div class="col-md-4">
                <img class="img-fluid" src="../../img/bn1.png">
            </div>
        </div>
    </div>
</div>


<div class="container my-4 mt-5" id="categories">
    <span class="heading-1 text-center my-4 ">Browse By Category</span>
    <div class="row">
        <div class="col-md-4">
            <div class="home-cat">
                <a href="products.php?category=Men" class="home-cat__btn">Men's Collection</a>
                <img class="img-fluid" src="./img/cat-men.jpg" alt="men"/></div>
        </div>
        <div class="col-md-4">
            <div class="home-cat">
                <a href="products.php?category=Women" class="home-cat__btn">Women's Collection</a>
                <img class="img-fluid" src="./img/cat-women.jpg" alt="women"/></div>
        </div>
        <div class="col-md-4">
            <div class="home-cat">
                <a href="products.php?category=Accessories" class="home-cat__btn">Accessories</a>
                <img class="img-fluid" src="./img/cat-accessories.jpg" alt="accessories"/></div>
        </div>
    </div>
</div>

<div class="container mt-5" id="collections">
    <span class="heading-1 text-center my-4 ">Latest Collections</span>

    <div class="row row-cols-lg-4 row-cols-1 gy-4">
        <?php
        foreach ($products as $product) {
            echo "<div class=\"col\">
            <div class=\"product-list__item text-center\">
                <div><a href=\"/product-view.php?id={$product["product_id"]}\"><img class=\"img-fluid product-list__item__img\" src=\"./img/{$product["image"]}\" alt=\"\"></a></div>
                <div class=\"mt-3\"><a  href=\"/product-view.php?id={$product["product_id"]}\"><span class=\"product-list__item--name\">{$product["name"]}</span></a></div>
                <div><span class=\"product-list__item--price\">৳ {$product["price"]}</span></div>
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
<?php include("footer.php");?>
