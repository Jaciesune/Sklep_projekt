<?php
include_once "components/head.php";
include_once "components/header.php";
include_once "components/nav.php";

$id = $_GET['id'];
$q1 = "SELECT * FROM products WHERE product_id = $id";
$q2 = "SELECT * FROM categories";

$product = $conn->query($q1)->fetch_object();
$categories = $conn->query($q2);

?>
<section class="edit_product">
  <form action="edit_product.php?id=<?= $id ?>" method="POST" enctype="multipart/form-data">
    <img src="<?= $product->picture_path ?>">
    <input type="text" name="name" value="<?= $product->name ?>">
    <input type="number" name="price" value="<?= $product->price ?>">
    <input type="number" name="quantity" value="<?= $product->quantity ?>">
    <select name="category_id">
      <?php
      while ($cat = $categories->fetch_object()) {
        if ($cat->category_id == $product->category_id) {
          echo "<option value='$cat->category_id' selected>$cat->category_name</option>";
        } else {
          echo "<option value='$cat->category_id'>$cat->category_name</option>";
        }
      }
      ?>
    </select>
    <label for="image">Zmień obrazek produktu</label>
    <input type="file" name="image" id="image">
    <textarea name="descr" id="" cols="30" rows="10"></textarea>
    <input type="submit" name="edit" value="Edytuj produkt">
  </form>
</section>

<?php

if (isset($_POST['edit'])) {
  $name = $_POST['name'];
  $price = $_POST['price'];
  $quantity = $_POST['quantity'];
  $category_id = $_POST['category_id'];
  if (isset($_FILES['image'])) {
    $file = $_FILES["image"]["name"];
    $tempname = $_FILES["image"]["tmp_name"];
    $fileNameCmps = explode(".", $file);
    $fileExtension = strtolower(end($fileNameCmps));
    $filename = md5($fileNameCmps[0]) . "." .  $fileExtension;
    $folder = "visualization/" . $filename;
    if (move_uploaded_file($tempname, $folder)) {
      $_SESSION['error'] = $filename;

      $q3 = "UPDATE `products` SET picture_path = '$folder' WHERE product_id = '$id'";

      $conn->query($q3);
    } else {
      $_SESSION['error'] = "Failed to upload image";
    }
  }
  $descr = $_POST['descr'];

  $q3 = "UPDATE `products` SET name = '$name', price = '$price', `quantity` = '$quantity', category_id = '$category_id', description = '$descr' WHERE product_id = '$id'";

  $conn->query($q3);

  header("Location: product.php?id=$id");
}


include_once "components/footer.php";
include_once "components/foot.php";
?>