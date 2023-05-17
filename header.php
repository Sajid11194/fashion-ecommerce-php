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
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
    <title>RaimentsGlobal</title>
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link href="css/style.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700;900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Italiana&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.lineicons.com/4.0/lineicons.css"/>
    <link href="https://fonts.googleapis.com/css2?family=Vollkorn+SC:wght@400;600;700;900&display=swap" rel="stylesheet">
</head>
<body>
<nav class="nav">
    <a href="/"><img src="img/logo.png"/></a>
    <form class="nav__form">
        <input type="text" class="nav__form__input" id="nav__form__input" name="nav-form" placeholder="Name">
        <button class="btn"><i class="lni lni-search-alt"></i></button>
    </form>
    <div class="nav__menu">
        <div class="nav__menu__item"><i class="lni lni-heart"></i>
            <span  class="nav__menu__item__name">Wish List</span></div>
        <div class="nav__menu__item"><i class="lni lni-cart"></i>
            <span  class="nav__menu__item__name">My Cart</span></div>
        <div class="nav__menu__item"><a href="/login.php"><i class="lni lni-user"></i>
                <span class="nav__menu__item__name">My Account</span></a></div>
        <?php
        if(isset($_SESSION["user_id"])){
            echo '<div class="nav__menu__item"><a href="/logout.php"><i class="lni lni-exit-up"></i>
                <span class="nav__menu__item__name">Logout</span></a></div>';
        }
        ?>

    </div>
</nav>

<nav class="nav-secondary">
    <div class="nav-secondary--left">
        <a class="nav-secondary--item dropdown-toggle dropdown" href="#" role="button" data-bs-toggle="dropdown-menu" aria-expanded="false">
            Home
        </a>
        <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
        </ul>
        <a class="nav-secondary--item" href="#">Home</a>
        <a class="nav-secondary--item" href="#">Home</a>
    </div>
    <div class="nav-secondary--right">
        <a class="nav-secondary--item" href="#">Home</a>
    </div>
</nav>