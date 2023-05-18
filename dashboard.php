<?php
global $con;
require("header.php");
if (isset($_SESSION["user_id"])) {

} else {
    header("Location: login.php");
}
?>
<div class="container my-5 text-center">
    <span class="heading-1 mb-5">Your Orders</span>
    <?php
    $user_info = get_user_info_by_id($_SESSION["user_id"]);
    $query = $con->prepare("SELECT * FROM `orders`  where user_id='{$_SESSION["user_id"]}'");
    $query->execute();
    $orders = $query->fetchAll();
    if (count($orders)) {
        foreach ($orders as $order) {
            $order_items=unserialize($order["products"]);
            echo '<div class="order__item p-5 text-start">
<div class="d-flex justify-content-between">
<div>
            <div class="my-2"><span class="order__item__title">Order ID: </span><span>' . $order["order_id"] . '</span></div>
            <div class="my-2"><span class="order__item__title">Address: </span><span>' . $order["address"] . '</span></div>
            <div class="my-2"><span class="order__item__title">Total Cost: </span><span>' . $order["total_cost"] . '</span></div>
</div>
<div>
            <div class="my-2"><span class="order__item__title">Shipment Status: </span><span>' . $order["payment_status"] . '</span></div>
            <div class="my-2"><span class="order__item__title">Payment Status: </span><span>' . $order["shipment_status"] . '</span></div>
</div>
</div>


';
                foreach($order_items as $item){
            echo '
            <div class="row cart__item my-2">
                <div class="d-flex">
                    <img class="img-fluid cart__item__image float-start" src="./img/' . $item["image"] . '">
                    <div class="cart__item__features flex-grow-1">
                        <a class="cart__item__name" href="product-view.php?id=' . $item["product_id"] . '">' . $item["name"] . '</a>
                        <div class="d-flex justify-content-between mt-5">
                            <div>
                                <div class="my-2"><span class="cart__item__title">Color: </span><span>' . $item["color"] . '</span></div>
                                <div class="my-2"><span class="cart__item__title">Size: </span><span>' . $item["size"] . '</span></div>
                            </div>
                            <div>
                                <div class="my-2"><span class="cart__item__title">Quantity: </span><span>' . $item["quantity"] . '</span></div>
                                <div class="my-2"><span class="cart__item__title">Price: </span><span>Tk ' . $item["price"] . '</span></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            ';
        }
                echo '</div>';
        }
    } else {
        echo '<p class="text-muted">You did not order anything yet</p><a href="index.php" class="btn my-5">Browse Products</a> </div>';
    }
    ?>
</div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
            integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3"
            crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.min.js"
            integrity="sha384-heAjqF+bCxXpCWLa6Zhcp4fu20XoNIA98ecBC1YkdXhszjoejr5y9Q77hIrv8R9i"
            crossorigin="anonymous"></script>
    </body>
    </html>