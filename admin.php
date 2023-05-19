<?php
global $con;
require("header.php");
?>

<?php

if(isset($_POST["name"])){
  $name=$_POST["name"];
  $categories=serialize(explode(",", $_POST["categories"]));
  $price=$_POST["price"];
  $sku=$_POST["sku"];
  $sizes=serialize($_POST["sizes"]);
  $colors=serialize(explode(",", $_POST["colors"]));;
  $inventory=$_POST["inventory"];
  $description=$_POST["description"];
  $product_image=$_POST["product_image"];
  $sql="INSERT INTO `products`(`name`, `price`, `categories`, `sku`, `sizes`, `colors`, `inventory`, `description`, `image`) VALUES ('$name','$price','$categories','$sku','$sizes','$colors','$inventory','$description','$product_image')";
  $query=$con->prepare($sql);
  $result=$query->execute();
  $message="";
  if($result) {
    $message = '<div class="alert alert-success alert-dismissible fade show" role="alert">
    Product added
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
  } else {
    $message = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
    Failed to add product
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
  }
}
?>

<div class="container my-5">
  <form action="" method="post" class="form">
    <span class="heading-1 form__title text-center">Add new product</span>
    <?php
    if(isset($message)){
      echo $message;
    }
    ?>
    <input class="form__input" type="text" name="name" placeholder="Product name"/>
    <input class="form__input" type="text" name="categories" placeholder="Category (comma separated)"/>
    <input class="form__input" type="number" name="price" placeholder="Price"/>
    <input class="form__input" type="text" name="sku" placeholder="Sku"/>
    <label class="form__checkbox__label">Available Sizes </label>

    <label class="form__checkbox__label">
      <input type="checkbox" name="sizes[]" value="S">
      S
    </label>
    <label  class="form__checkbox__label">
      <input type="checkbox" name="sizes[]" value="M">
      M
    </label>
    <label  class="form__checkbox__label">
      <input type="checkbox" name="sizes[]" value="L">
      L
    </label>
    <label  class="form__checkbox__label">
      <input type="checkbox" name="sizes[]" value="XL">
      XL
    </label>
    <label  class="form__checkbox__label">
      <input type="checkbox" name="sizes[]" value="XXL">
      XXL
    </label>
    <input class="form__input" type="text" name="colors" placeholder="Colors (comma separated)"/>
    <input class="form__input" type="text" name="inventory" placeholder="Inventory count"/>
    <textarea class="form__input" name="description" rows="4" cols="50" placeholder="Product description"></textarea>
    <label>Product Image : </label>
    <input class="form__input" type="text" name="product_image" accept=".jpg,.jpeg,.png"/>
    <button type="submit" class="btn w-100 my-4">Save</button>
  </form>
</div>
<?php include("footer.php");?>
