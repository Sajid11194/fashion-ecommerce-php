<?php
if(isset($_SESSION["role"])){
    if($_SESSION["role"]!="admin"){
        header("Location: /index.php");
    }
} else {
    header("Location: /login.php");
}
?>