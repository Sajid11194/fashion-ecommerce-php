<?php
require("header.php");
?>

<?php
if (isset($_GET["id"])) {
    $product = fetch_product_by_id($_GET["id"]);
    if(!$product){
        echo "404 Page";
        header("Location: 404.php");
    }
}
if (isset($_POST["product_id"])) {
    $product_id = $_POST["product_id"];
    $color=$_POST["color"];
    $size=$_POST["size"];
    $quantity=$_POST["quantity"];
    $cart=array("product_id"=>$product_id,"color"=>$color,"size"=>$size,"quantity"=>$quantity);
    array_push($_SESSION["cart"], $cart);
    header("Location: index.php");
}
?>

<div class="container my-5">
    <div class="row">
        <div class="col-12 col-lg-6">
            <img class="img-fluid" src="./img/product2.jpg"/>
        </div>
        <div class="col-12 col-lg-6">
            <div class="product">
                <h2 class="product__heading"><?php echo $product['name']; ?></h2>
                <p class="product__price">Tk <?php echo $product['price']; ?></p>
                <p class="product__short-info"><?php echo $product['description']; ?></p>
                <form action="" method="post">
                    <div class="product__feature">
                        <p class="product__feature__title d-block">Select Color: </p>
                        <?php
                        foreach (unserialize($product['colors']) as $item) {
                            echo "<span class=\"me-2\">
                                <input type=\"radio\" name=\"color\" id=\"color-$item\" value=\"$item\" class=\"product__feature__color-select-radio\"/>
                                 <label for=\"color-$item\" style=\"background-color:$item\" class=\"product__feature__color-select-label\"></label>
                                 </span>";
                        }
                        ?>
                    </div>
                    <div class="product__feature">
                        <p class="product__feature__title d-block">Select Size: </p>
                        <?php
                        foreach (unserialize($product['sizes']) as $item) {
                            echo "<span class=\"me-2\">
                                <input type=\"radio\" name=\"size\" id=\"size-$item\" value=\"$item\" class=\"product__feature__size-select-radio\"/>
                                 <label for=\"size-$item\" class=\"product__feature__size-select-label\">$item</label>
                                 </span>";
                        }
                        ?>
                    </div>
                    <div class="d-flex align-items-baseline">
                        <input type="number" class="form__input product__feature__select-quantity" name="quantity"
                               placeholder="Quantity"/>
                        <input type="text" name="product_id" value="<?php echo $product["product_id"] ?>" hidden/>
                        <button class="btn">Add to Cart</button>
                    </div>
                </form>
                <div class="product__feature">
                    <span class="product__feature__title">Sku:</span> <span><?php echo $product['sku']; ?></span>
                </div>
                <div class="product__feature">
                    <span class="product__feature__title">Category:</span>
                    <span><?php foreach (unserialize($product['categories']) as $item) {
                            echo "<a href=\"#$item\">$item</a>, ";
                        } ?></span>
                </div>
                <div class="my-4">
                    <a class="btn btn--round"><i class="lni lni-search-alt"></i></a>
                    <a class="btn btn--round"><i class="lni lni-search-alt"></i></a>
                    <a class="btn btn--round"><i class="lni lni-search-alt"></i></a>
                    <a class="btn btn--round"><i class="lni lni-search-alt"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3"
        crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.min.js"
        integrity="sha384-heAjqF+bCxXpCWLa6Zhcp4fu20XoNIA98ecBC1YkdXhszjoejr5y9Q77hIrv8R9i"
        crossorigin="anonymous"></script>
</body>
</html>