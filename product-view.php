<?php
require("header.php");
?>

<?php
if (isset($_GET["id"])) {
    $product = get_product_by_id($_GET["id"]);
    if(!$product){
        echo "404 Page";
        header("Location: 404.php");
    }
}
if (isset($_POST["product_id"])) {
    if(isset($_SESSION["user_id"])){
    $product_id = $_POST["product_id"];
    $quantity=$_POST["quantity"];
    if(isset($_POST["color"]) && isset($_POST["size"]) && is_numeric($quantity) && $quantity>0){
        $color=$_POST["color"];
        $size=$_POST["size"];
        $cart=array("product_id"=>$product_id,"color"=>$color,"size"=>$size,"quantity"=>$quantity);
        array_push($_SESSION["cart"], $cart);
        echo '<div class="container my-5"><div class="alert alert-success alert-dismissible fade show" role="alert">
  Product added to cart
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div></div>';
    } else {
        echo '<div class="container my-5"><div class="alert alert-danger alert-dismissible fade show" role="alert">
  Enter all info for the product
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div></div>';
    }

    } else {
        header("Location: login.php");
    }
}
?>

<div class="container my-5">
    <div class="row">
        <div class="col-12 col-lg-6">
            <img class="img-fluid img-thumbnail h-100" src="./img/<?php echo $product['image']; ?>"/>
        </div>
        <div class="col-12 col-lg-6">
            <div class="product">
                <h2 class="product__heading"><?php echo $product['name']; ?></h2>
                <p class="product__price">৳ <?php echo $product['price']; ?></p>
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
                            echo "<a href=\"/products.php?category=$item\">$item</a>, ";
                        } ?></span>
                </div>
                <div class="my-4">
                    <a href="#" class="btn btn--round me-2"><i class="lni lni-facebook-original"></i></a>
                    <a href="#" class="btn btn--round me-2"><i class="lni lni-google"></i></a>
                    <a href="#" class="btn btn--round me-2"><i class="lni lni-youtube"></i></a>
                    <a href="#" class="btn btn--round me-2"><i class="lni lni-discord-alt"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include("footer.php");?>
