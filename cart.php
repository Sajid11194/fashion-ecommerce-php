<?php
global $con;
require("header.php");
if (isset($_SESSION["user_id"])) {

} else {
    header("Location: login.php");
}
?>

<?php
if(isset($_POST["remove_product"])){
    $product_id=$_POST["remove_product"];
    $cart_products=[];
    foreach ($_SESSION["cart"] as $item){
        if($item["product_id"]!=$product_id){
            $cart_products[]=$item;
        }
    }
    $_SESSION["cart"]=$cart_products;
}
$user_info=get_user_info_by_id($_SESSION["user_id"]);
$cart_products=$_SESSION["cart"];

if (count($cart_products)) {
for($i=0;$i<count($cart_products);$i++){
    $query=$con->prepare("SELECT * FROM `products` WHERE product_id='{$cart_products[$i]["product_id"]}'");
    $query->execute();
    $result=$query->fetch();
    if($result){
        $cart_products[$i]["name"]=$result["name"];
        $cart_products[$i]["price"]=$result["price"];
        $cart_products[$i]["image"]=$result["image"];
        $cart_products[$i]["exists"]=true;
    } else {
        $cart_products[$i]["exists"]=false;
    }
}
}

if (count($cart_products)) {
    echo '
    <div class="container my-5">
        <div class="row">
            <div class="col-md-8">';
     foreach ($cart_products as $item) {
            echo '
            <div class="cart__item">
                <div class="d-flex">
                    <img class="img-fluid cart__item__image float-start" src="./img/'.$item["image"].'">
                    <div class="cart__item__features flex-grow-1">
                        <div class="d-flex justify-content-between"><a class="cart__item__name" href="product-view.php?id='.$item["product_id"].'">'.$item["name"].'</a>
                        <form action="" method="post"><input type="text" name="remove_product" value="'.$item["product_id"].'" hidden/><button class="cart__item__remove-btn" type="submit"><i class="lni lni-circle-minus"></i></button></form>
                        </div>
                        <div class="d-flex justify-content-between mt-5">
                            <div>
                                <div class="my-2"><span class="cart__item__title">Color: </span><span>'.$item["color"].'</span></div>
                                <div class="my-2"><span class="cart__item__title">Size: </span><span>'.$item["size"].'</span></div>
                            </div>
                            <div>
                                <div class="my-2"><span class="cart__item__title">Quantity: </span><span>'.$item["quantity"].'</span></div>
                                <div class="my-2"><span class="cart__item__title">Price: </span><span>৳ '.$item["price"].'</span></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>';
        }

    echo '
            </div>
            <div class="col-md-4">
                <div class="cart__summary">
                    <div class="d-flex justify-content-between"><span class="cart__item__title">Price: </span>
                        <span>৳ ';

    $price = 0;
    foreach ($cart_products as $item) {
        $price += $item["price"] * $item["quantity"];
    }
    echo $price;
    echo '</span></div>
                    <div class="d-flex justify-content-between"><span class="cart__item__title">Tax: </span>
                        <span>৳ 0</span></div>
                    <hr>
                    <div class="d-flex justify-content-between"><span class="cart__item__title">Total: </span>
                        <span>৳ '.$price.'</span></div>
                    <div class="my-4">
                        <div class="d-flex justify-content-between"><span class="cart__item__title">Address: </span> <span>'.$user_info["address"]. '</span>
                        </div>
                        <div class="d-flex justify-content-between"><span class="cart__item__title">Payment Method: </span>
                            <span>Cash on Delivery</span></div>
                    </div>
                    <form action="confirm-order.php" method="post">
                        <input type="text" name="place_order" value="order" hidden>
                        <button type="submit" class="btn w-100">Place Order</button>
                    </form>
                </div>
            </div>
        </div>
    </div>';
} else {
    echo '<div class="container my-5 text-center"><span class="heading-1">Cart is empty</span><a href="index.php" class="btn my-5">Return to home</a> </div>';
}
?>

<?php include("footer.php");?>
