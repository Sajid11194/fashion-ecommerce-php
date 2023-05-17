<?php
require('db.php');
function user_login($username, $password)
{
    global $con;
    $query = $con->prepare("SELECT `user_id` FROM `users`  where (email = '$username' or username = '$username') and  password='$password'");
    $query->execute();
    return $query->fetch();
}

function user_signup($username,$email,$password)
{
    global $con;
    $query = $con->prepare("INSERT INTO `users`(`username`, `email`, `password`) VALUES ('$username','$email','$password')");
    return $query->execute();
}

function fetch_products(){
    global $con;
    $query = $con->prepare("SELECT * FROM `products` WHERE 1");
    $query->execute();
    return $query->fetchAll();
}
function fetch_product_by_id($product_id){
    global $con;
    $query = $con->prepare("select * from products where product_id = '$product_id'");
    $query->execute();
    return $query->fetch();
}

?>