<?php
include_once "components/head.php";
include_once "components/header.php";
include_once "components/nav.php";
?>

<main>

  <h2 class="subtitle">Oferta specjalna</h2>

  <?php
  $product_id = $_GET['id'];
  $q1 = "SELECT * FROM `products` WHERE product_id = $product_id";
  $conn = connect();
  $res = $conn->query($q1);
  ?>

  <div class="show-product">
    <ul class="product-list">
      <?php
      while ($row = $res->fetch_object()) {
        if ($row->name == 'Kubek Satisfactory' || $row->name == 'Plakat "Satisfactory Update 5"') {
          echo "<div class='product-img-container'>";
          echo "<img src='$row->picture_path' alt='obrazek produktu'>";
          echo "</div>";
          echo "<li>Nazwa: " . $row->name . "</li>";
          echo "<li>Cena: " . substr($row->price, 0, 1) . " Kupon FICSIT</li>";
          echo "<li>Ilość w magazynie: " . $row->quantity . "</li>";
        } else {
          echo "<div class='product-img-container'>";
          echo "<img src='$row->picture_path' alt='obrazek produktu'>";
          echo "</div>";
          echo "<li>Nazwa: " . $row->name . "</li>";
          echo "<li>Cena: " . $row->price . " zł</li>";
          echo "<li>Ilość w magazynie: " . $row->quantity . "</li>";
        }
      }
      ?>
    </ul>
  </div>

</main>

<?php
include_once "components/footer.php";
include_once "components/foot.php";
?>