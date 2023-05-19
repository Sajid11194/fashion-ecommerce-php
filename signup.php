<?php
require("header.php");
?>
<?php
if (isset($_POST["username"])) {
  $username = $_POST["username"];
  $email = $_POST["email"];
  $password = $_POST["password"];
  $address= $_POST["address"];

    $result = user_signup($username, $email, $password,$address);
  $message = "";
  if ($result) {
    $message = '<div class="alert alert-success alert-dismissible fade show" role="alert">
    Successfully signed up
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
  } else {
    $message = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  Unknown error occurred
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
  }
}
?>

<div class="container my-5">
    <form class="form" action="" method="post">
        <span class="heading-1 form__title text-center">Signup</span>
        <?php
          if(isset($message)){echo $message;};
        ?>
        <input class="form__input" type="text" name="username" placeholder="Username"/>
        <input class="form__input" type="email" name="email" placeholder="Email address"/>
        <input class="form__input" type="password" name="password" placeholder="Password"/>
        <input class="form__input" type="text" name="address" placeholder="Delivery Address"/>

        <input type="submit" class="btn w-100 my-4" value="Create new account"/>
        <p class="text-center">Or</p>
        <a class="btn-outline d-block text-center my-4" href="/login.php">Login</a>
    </form>
</div>

<?php include("footer.php");?>
