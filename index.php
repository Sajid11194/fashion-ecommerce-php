<?php
require("header.php");
?>
<?php
    $products=fetch_products();
?>

<div id="home-carousel" class="carousel slide">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <div class="banner banner--1">
                <div class="container">
                    <div class="banner__content">
                        <h1 class="banner__content__heading">The Great Fashion Collection</h1>
                        <h6 class="banner__content__text">The best fashion shop in the world</h6>
                        <button class="btn">View Collection</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="carousel-item">
            <div class="banner banner--2">
                <div class="container">
                    <div class="banner__content">
                        <h1 class="banner__content__heading">The Great Fashion Collection</h1>
                        <h6 class="banner__content__text">The best fashion shop in the world</h6>
                        <button class="btn">View Collection</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="carousel-item">
            <div class="banner banner--3">
                <div class="container">
                    <div class="banner__content">
                        <h1 class="banner__content__heading">The Great Fashion Collection</h1>
                        <h6 class="banner__content__text">The best fashion shop in the world</h6>
                        <button class="btn">View Collection</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#home-carousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>
<?php
print_r($_SESSION["cart"]);
?>
<div class="container my-4 mt-5">
    <span class="heading-1 text-center my-4 ">Browse By Category</span>
    <div class="row">
    <div class="col-md-4"><div class="home-cat"><button class="home-cat__btn">Men's Collection</button> <img class="img-fluid" src="./img/cat-men.jpg" alt="men"/></div></div>
    <div class="col-md-4"><div class="home-cat"><button class="home-cat__btn">Men's Collection</button><img class="img-fluid" src="./img/cat-women.jpg"  alt="women"/></div></div>
    <div class="col-md-4"><div class="home-cat"><button class="home-cat__btn">Men's Collection</button><img class="img-fluid" src="./img/cat-accessories.jpg" alt="accessories"/></div> </div>
    </div>
</div>

<div class="container mt-5">
    <span class="heading-1 text-center my-4 ">Latest Collections</span>

    <div class="row row-cols-lg-4 row-cols-1 gy-4">
        <?php
            foreach($products as $product){
                echo "<div class=\"col\">
            <div class=\"product-list__item text-center\">
                <a href=\"/product.php?id={$product["product_id"]}\"><img class=\"img-fluid product-list__item__img\" src=\"./img/product2.png\" alt=\"\"></a>
                <span class=\"product-list__item--name\">{$product["name"]}</span>
                <span class=\"product-list__item--price\">Tk {$product["price"]}</span>
                <div class=\"\">
                    <a href=\"/product.php?id={$product["product_id"]}\" class=\"btn d-block mt-2\">
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
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.min.js"
        integrity="sha384-heAjqF+bCxXpCWLa6Zhcp4fu20XoNIA98ecBC1YkdXhszjoejr5y9Q77hIrv8R9i"
        crossorigin="anonymous"></script>
</body>
</html>