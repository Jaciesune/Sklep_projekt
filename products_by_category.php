<?php
include_once "components/head.php";
include_once "components/header.php";
include_once "components/nav.php";
$conn = connect();

$q1 = "SELECT * FROM `categories`";
$res = $conn->query($q1);
?>

<form action="products_by_category.php" method="GET">
  <select name="category_select" id="category_select">
    <?php
    while ($row = $res->fetch_object()) {
      echo "<option value='$row->category_id'>" . $row->category_name . "</option>";
    }
    ?>
    <input type="submit" value="Zatwierdź">
  </select>
</form>

<?php
if (isset($_GET['category_select'])) {

  $selected_cat = $_GET['category_select'];
  $q2 = "SELECT category_name FROM categories WHERE category_id = $selected_cat";

  $res = $conn->query($q2);
  $name = "categories.category_name";
  $a = $res->fetch_object();
  echo "<h1 class='subtitle'>$a->category_name</h1>";

  $q3 = "SELECT * FROM products WHERE category_id = $selected_cat";
  $res = $conn->query($q3);

} else {
  echo "<h1>Wybierz kategorię</h1>";
}
?>



<section class="product-list">
  <?php

  while ($row = $res->fetch_object()) {
    echo "<a href='product.php?id=$row->product_id'><div class='product-list-child' id='product'>";
    echo "<img src='$row->picture_path' alt='obrazek produktu'>";
    echo "<div class='product-list-child-desc'>";
    echo "<p><b>Nazwa Produktu</b>: $row->name</p>";
    echo "<p><b>Cena</b>: $row->price</p>";
    echo "<p><b>Ilość w magazynie</b>: $row->quantity</p>";
    echo "</div></div></a>";
  }
  ?>
</section>

<?php
include_once "components/footer.php";
include_once "components/foot.php";
?>