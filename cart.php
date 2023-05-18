<?php
global $con;
require("header.php");
if (isset($_SESSION["user_id"])) {

} else {
    header("Location: login.php");
}
?>

<?php
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
            <div class="row cart__item">
                <div class="d-flex">
                    <img class="img-fluid cart__item__image float-start" src="./img/'.$item["image"].'">
                    <div class="cart__item__features flex-grow-1">
                        <a class="cart__item__name" href="product-view.php?id='.$item["product_id"].'">'.$item["name"].'</a>
                        <div class="d-flex justify-content-between mt-5">
                            <div>
                                <div class="my-2"><span class="cart__item__title">Color: </span><span>'.$item["color"].'</span></div>
                                <div class="my-2"><span class="cart__item__title">Size: </span><span>'.$item["size"].'</span></div>
                            </div>
                            <div>
                                <div class="my-2"><span class="cart__item__title">Quantity: </span><span>'.$item["quantity"].'</span></div>
                                <div class="my-2"><span class="cart__item__title">Price: </span><span>Tk '.$item["price"].'</span></div>
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
                        <span>Tk ';

    $price = 0;
    foreach ($cart_products as $item) {
        $price += $item["price"] * $item["quantity"];
    }
    echo $price;
    echo '</span></div>
                    <div class="d-flex justify-content-between"><span class="cart__item__title">Tax: </span>
                        <span>Tk 0</span></div>
                    <hr>
                    <div class="d-flex justify-content-between"><span class="cart__item__title">Total: </span>
                        <span>Tk '.$price.'</span></div>
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

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3"
        crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.min.js"
        integrity="sha384-heAjqF+bCxXpCWLa6Zhcp4fu20XoNIA98ecBC1YkdXhszjoejr5y9Q77hIrv8R9i"
        crossorigin="anonymous"></script>
</body>
</html>