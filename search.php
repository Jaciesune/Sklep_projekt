<?php
include_once "components/head.php";
include_once "components/header.php";
include_once "components/nav.php";
$conn = connect();

?>

<form method="POST">
  <input type="textarea" name="search_val" placeholder="Szukaj produktów po nazwie">
  <input type="submit" value="szukaj">
</form>

<section class="product-list">
  <?php

  if (isset($_POST['search_val'])) {
    $search_val = $_POST['search_val'];

    $q1 = "SELECT * FROM `products` INNER JOIN categories c USING(category_id) WHERE name LIKE '%$search_val%'";

    $res = $conn->query($q1);
    while ($row = $res->fetch_object()) {
      echo "<a href='product.php?id=$row->product_id'><div class='product-list-child' id='product'>";
      echo "<img src='$row->picture_path' alt='obrazek produktu'>";
      echo "<div class='product-list-child-desc'>";
      echo "<p><b>Nazwa Produktu</b>: $row->name</p>";
      echo "<p><b>Cena</b>: $row->price</p>";
      echo "<p><b>Ilość w magazynie</b>: $row->quantity</p>";
      echo "</div></div></a>";
    }
  }

  ?>
</section>

<?php
include_once "components/footer.php";
include_once "components/foot.php";
?>