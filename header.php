<?php
session_start();
require("db.php");
require("functions.php");
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Raiments</title>
    <link rel="icon" href="./img/favicon.ico">
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link href="css/style.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700;900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Italiana&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Vollkorn+SC:wght@400;600;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.lineicons.com/4.0/lineicons.css"/>

</head>
<body>
<nav class="nav">
    <div class="container nav__body">
    <a href="/"><img src="img/logo.png"/></a>
    <form class="nav__form" action="products.php" method="get">
        <input type="text" class="nav__form__input" id="nav__form__input" name="search" placeholder="Name">
        <button type="submit" class="btn"><i class="lni lni-search-alt"></i></button>
    </form>
    <div class="nav__menu">
        <div class="nav__menu__item"><a href="/cart.php"><i class="lni lni-cart"></i>
                <span  class="nav__menu__item__name">My Cart<?php if(isset($_SESSION["cart"])){echo '('.count($_SESSION["cart"]).')';}?></span></a></div>
        <div class="nav__menu__item"><a href="/dashboard.php"><i class="lni lni-dropbox-original"></i>
                <span class="nav__menu__item__name">My Orders</span></a></div>
        <?php
        if(isset($_SESSION["user_id"])){
            echo '<div class="nav__menu__item"><a href="/logout.php"><i class="lni lni-exit-up"></i>
                <span class="nav__menu__item__name">Logout</span></a></div>';
        } else {
            echo '<div class="nav__menu__item"><a href="/login.php"><i class="lni lni-enter"></i>
                <span class="nav__menu__item__name">Login</span></a></div>';
        }
        ?>
    </div>
    </div>
</nav>

<nav class="nav-secondary">
    <div class="container nav-secondary__body">
    <div class="nav-secondary--left">
        <a class="nav-secondary--item" href="/index.php">
            Home
        </a>
        <a class="nav-secondary--item" href="index.php#categories">Categories</a>
        <a class="nav-secondary--item" href="index.php#collections">Collections</a>
    </div>
    <div class="nav-secondary--right">
        <a class="nav-secondary--item" href="index.php#footer">Contact Us</a>
    </div>
    </div>
</nav>
