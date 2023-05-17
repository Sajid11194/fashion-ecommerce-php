<?php
require("header.php");
?>

<?php
echo '<div class="toast" role="alert" aria-live="assertive" aria-atomic="true">
<div class="toast-header">
  <img src="..." class="rounded me-2" alt="...">
  <strong class="me-auto">Bootstrap</strong>
  <small>1 second ago</small>
  <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
</div>
<div class="toast-body">
  Product added
</div>
</div>';
if(isset($_POST["name"])){
print_r(explode(",", $_POST["categories"]));
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
if($result){
    echo '<div class="toast" role="alert" aria-live="assertive" aria-atomic="true">
    <div class="toast-header">
      <img src="..." class="rounded me-2" alt="...">
      <strong class="me-auto">Bootstrap</strong>
      <small>1 second ago</small>
      <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
    </div>
    <div class="toast-body">
      Product added
    </div>
  </div>';
} else {
    echo '<div class="toast" role="alert" aria-live="assertive" aria-atomic="true">
    <div class="toast-header">
      <img src="..." class="rounded me-2" alt="...">
      <strong class="me-auto">Bootstrap</strong>
      <small>1 second ago</small>
      <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
    </div>
    <div class="toast-body">
      Fail to add new product.
    </div>
  </div>';
}
}
?>

<div class="container my-5">
  <form action="" method="post" class="form">
    <span class="heading-1 form__title text-center">Add new product</span>
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
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3"
        crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.min.js"
        integrity="sha384-heAjqF+bCxXpCWLa6Zhcp4fu20XoNIA98ecBC1YkdXhszjoejr5y9Q77hIrv8R9i"
        crossorigin="anonymous"></script>
</body>
</html>