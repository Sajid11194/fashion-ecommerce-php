<?php
global $con;
require("header.php");
require("auth-admin.php");
?>
<script>
    function statusChange(form){
        form.submit();
    }
</script>
<div class="container my-5 text-center">
    <span class="heading-1 mb-5">All Orders</span>
    <?php
    $query = $con->prepare("SELECT * FROM `orders`  where 1");
    $query->execute();
    $orders = $query->fetchAll();
    if (count($orders)) {
        foreach ($orders as $order) {
            $order_items=unserialize($order["products"]);
            echo '<div class="order__item p-5 text-start" id="'.$order["order_id"].'">
<div class="d-flex justify-content-between">
<div>
            <div class="my-2"><span class="order__item__title">Order ID: </span><span>' . $order["order_id"] . '</span></div>
            <div class="my-2"><span class="order__item__title">Address: </span><span>' . $order["address"] . '</span></div>
            <div class="my-2"><span class="order__item__title">Total Cost: </span><span>' . $order["total_cost"] . '</span></div>
</div>
<div>
            <form action="modify-order.php" method="post" class="order__item__status" onchange="statusChange(this)">
            <div class="my-2"><span class="order__item__title">Shipment Status: </span><span><input value="' . $order["order_id"] . '" name="order_id" hidden><select name="shipment_status" class="order__item__status__select" ><option value="' . $order["shipment_status"] . '" hidden>' . ucfirst($order["shipment_status"]) . '</option><option value="pending">Pending</option><option value="shipped">Shipped</option></select></span></div>
            <div class="my-2"><span class="order__item__title">Payment Status: </span><span><select name="payment_status" class="order__item__status__select" ><option value="' . $order["payment_status"] . '" hidden>' . ucfirst($order["payment_status"]) . '</option><option value="pending">Pending</option><option value="paid">Paid</option></select></span></div>
            </form>
</div>
</div>


';
            foreach($order_items as $item){
                echo '
            <div class="row cart__item my-2">
                <div class="d-flex">
                    <img class="img-fluid cart__item__image float-start" src="../img/' . $item["image"] . '">
                    <div class="cart__item__features flex-grow-1">
                        <a class="cart__item__name" href="/product-view.php?id=' . $item["product_id"] . '">' . $item["name"] . '</a>
                        <div class="d-flex justify-content-between mt-5">
                            <div>
                                <div class="my-2"><span class="cart__item__title">Color: </span><span>' . $item["color"] . '</span></div>
                                <div class="my-2"><span class="cart__item__title">Size: </span><span>' . $item["size"] . '</span></div>
                            </div>
                            <div>
                                <div class="my-2"><span class="cart__item__title">Quantity: </span><span>' . $item["quantity"] . '</span></div>
                                <div class="my-2"><span class="cart__item__title">Price: </span><span>৳ ' . $item["price"] . '</span></div>
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
        echo '<p class="text-muted">No one order anything yet</p><a href="index.php" class="btn my-5">Browse Products</a> </div>';
    }
    ?>
</div>
<?php include("footer.php");?>
