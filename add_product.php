<?php
include_once "components/head.php";
include_once "components/header.php";
include_once "components/nav.php";

$q1 = "SELECT * FROM categories";

$categories = $conn->query($q1);

?>
<section class="edit_product">
  <form action="add_product.php" method="POST" enctype="multipart/form-data">
    <input type="text" name="name" placeholder="Nazwa produktu">
    <input type="number" name="price" placeholder="Cena produktu">
    <input type="number" name="quantity" placeholder="Ilość w magazynie">
    <select name="category_id">
      <?php
      while ($cat = $categories->fetch_object()) {
          echo "<option value='$cat->category_id'>$cat->category_name</option>";
        }
      ?>
    </select>
    <label for="image">Dodaj obrazek produktu:</label>
    <input type="file" name="image" id="image">
    <textarea name="descr" id="" cols="30" rows="10"></textarea>
    <input type="submit" name="add" value="Dodaj produkt">
  </form>
</section>

<?php

if (isset($_POST['add'])) {
  $name = $_POST['name'];
  $price = $_POST['price'];
  $quantity = $_POST['quantity'];
  $category_id = $_POST['category_id'];
  $descr = $_POST['descr'];

  $q2 = "INSERT INTO `products`(`product_id`, `name`, `price`, `quantity`, `category_id`, `description`) VALUES (NULL, '$name', '$price', '$quantity', '$category_id', '$descr')";
  $conn->query($q2);

  $q3 = "SELECT product_id FROM products WHERE name = '$name' AND price = '$price' AND quantity = '$quantity' AND category_id = '$category_id' AND description = '$descr'";
  $id = $conn->query($q3)->fetch_object()->product_id;
  
  if (isset($_FILES['image'])) {
    $file = $_FILES["image"]["name"];
    $tempname = $_FILES["image"]["tmp_name"];
    $fileNameCmps = explode(".", $file);
    $fileExtension = strtolower(end($fileNameCmps));
    $filename = md5($fileNameCmps[0]) . "." .  $fileExtension;
    $folder = "visualization/" . $filename;
    if (move_uploaded_file($tempname, $folder)) {
      $q4 = "UPDATE `products` SET picture_path = '$folder' WHERE product_id = '$id'";
      $conn->query($q4);
    } else {
      $_SESSION['error'] = "Failed to upload image";
    }
  }
}

include_once "components/footer.php";
include_once "components/foot.php";
?>