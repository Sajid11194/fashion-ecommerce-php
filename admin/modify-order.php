<?php
global $con;
require("header.php");
require("auth-admin.php");
?>

<?php

if (isset($_POST["order_id"])) {
    $order_id=$_POST["order_id"];
    $shipment_status=$_POST["shipment_status"];
    $payment_status=$_POST["payment_status"];

    $sql = "UPDATE `orders` SET `shipment_status`='$shipment_status' , `payment_status`='$payment_status' WHERE order_id='$order_id'";
    $query = $con->prepare($sql);
    $result = $query->execute();
    if ($result) {
        header("Location: orders.php#$order_id");
    } else {
        echo '<script>alert("Unknown Error")</script>';
        header("Location: orders.php#$order_id");
    }
}
?>

