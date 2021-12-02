<?php
include_once "components/head.php";
include_once "components/header.php";
include_once "components/nav.php";
$conn = connect();

$q1 = "SELECT * FROM `products` INNER JOIN categories c USING(category_id) WHERE c.category_name = 'Komputery'";

$res = $conn->query($q1);
?>

<section class="product-list">
<?php
      while ($row = $res->fetch_object()) {
          echo "<div class='product-list-child'>";
          echo "<img src='$row->picture_path' alt='obrazek produktu'>";
          echo "<div class='product-list-child-desc'>";
          echo "<p><b>Nazwa Produktu</b>: $row->name</p>";
          echo "<p><b>Cena</b>: $row->price</p>";
          echo "<p><b>Ilość w magazynie</b>: $row->quantity</p>";
          echo "</div></div>";
        }
      ?>
</section>


<?php
include_once "components/footer.php";
include_once "components/foot.php";
?>