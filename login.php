<?php
require("header.php");
?>
<?php
if (isset($_POST["username"])) {
  $username = $_POST["username"];
  $password = $_POST["password"];
  $message="";
  $result = user_login($username,$password);
  if ($result) {
    $_SESSION["user_id"]=$result["user_id"];
    $_SESSION["cart"]=array();
    $_SESSION["role"]=$result["role"];
    if($result["role"]=="admin"){
      header("Location: /admin/");
    } else {
      header("Location: index.php");
    }
  } else {
    $message = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  Username or password invalid
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
  }
}
?>

<div class="container my-5">
  <form class="form" action="" method="post">
    <span class="heading-1 form__title text-center">Login</span>
    <?php
    if(isset($message)){echo $message;};
    ?>
    <input class="form__input" type="text" name="username" placeholder="Email or Username"/>
    <input class="form__input" type="password" name="password" placeholder="Password"/>
    <button type="submit" class="btn w-100 my-4">Login</button>
    <p class="text-center">Or</p>
    <a class="btn-outline d-block text-center my-4" href="/signup.php">Create an account</a>
  </form>
</div>
<?php include("footer.php");?>
