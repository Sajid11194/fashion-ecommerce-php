<?php
global $con;
require("header.php");
if (isset($_SESSION["user_id"])) {

} else {
    header("Location: login.php");
}

?>
<?php
$user_info = get_user_info_by_id($_SESSION["user_id"]);
$cart_products = $_SESSION["cart"];

if (count($cart_products) && isset($_POST["place_order"])) {
    for ($i = 0; $i < count($cart_products); $i++) {
        $query = $con->prepare("SELECT * FROM `products` WHERE product_id='{$cart_products[$i]["product_id"]}'");
        $query->execute();
        $result = $query->fetch();
        if ($result) {
            $cart_products[$i]["name"] = $result["name"];
            $cart_products[$i]["price"] = $result["price"];
            $cart_products[$i]["image"] = $result["image"];
            $cart_products[$i]["exists"] = true;
        } else {
            $cart_products[$i]["exists"] = false;
        }
    }
    $total_cost = 0;
    foreach ($cart_products as $product) {
        $total_cost += $product["price"] * $product["quantity"];
    }
    $products = serialize($cart_products);
    $sql = "INSERT INTO `orders`(`user_id`,`products`,`total_cost`,`address`, `payment_status`, `shipment_status`) VALUES ('{$_SESSION["user_id"]}','$products','$total_cost','{$user_info["address"]}','Pending','Pending')";
    $query = $con->prepare($sql);
    $result = $query->execute();
    $_SESSION["cart"] = array();
}
?>

<div class="container my-5 text-center">
    <?php
    if ($result) {
        echo '
               <span class="heading-1">Order Placed</span>
                <p class="text-muted my-5">Order ID : ' . $con->lastInsertId() . '</p>
                ';
    } else {
        echo '
        <p class="text-muted my-5">Unknown error</p>';
    }
    ?>
    <a href="/index.php" class="btn">Go to Home</a>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.min.js"
        integrity="sha384-heAjqF+bCxXpCWLa6Zhcp4fu20XoNIA98ecBC1YkdXhszjoejr5y9Q77hIrv8R9i"
        crossorigin="anonymous"></script>
</body>
</html>