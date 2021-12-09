<?php
include_once "components/head.php";
include_once "components/header.php";
include_once "components/nav.php";
?>

<main>

  <?php
  $product_id = $_GET['id'];
  $q1 = "SELECT * FROM `products` WHERE product_id = $product_id";
  $q2 = "SELECT `name` FROM `products` WHERE product_id = $product_id";
  $conn = connect();

  $res_s = $conn->query($q2);
  $prod_name = $res_s->fetch_object();
  echo "<h2 class='product_name'>$prod_name->name</h2>";
  $res = $conn->query($q1);

  ?>

  <div class="show-product">
    <?php
    while ($row = $res->fetch_object()) {
      if ($row->name == 'Kubek Satisfactory' || $row->name == 'Plakat "Satisfactory Update 5"') {
        echo "<div class='product-img-container'>";
        echo "<img src='$row->picture_path' alt='obrazek produktu'>";
        echo "<form action='./cart_form.php' method='POST'>";
        echo "<input type='hidden' name='product' value='$row->product_id'>";
        echo "<input type='submit'>";
        echo "</form>";
        echo "</div>";
        echo "<p>Cena: " . substr($row->price, 0, 1) . " Kupon FICSIT</p>";
        echo "<p>Ilość w magazynie: " . $row->quantity . "</p>";
      } else {
        echo "<div class='product-img-container'>";
        echo "<img src='$row->picture_path' alt='obrazek produktu'>";
        echo "<form action='./cart_form.php' method='POST'>";
        echo "<input type='hidden' name='product' value='$row->product_id'>";
        echo "<input type='submit' value='Dodaj do koszyka' id='addToCart'>";
        echo "</form>";
        echo "</div>";
        echo "<div><p>Cena: " . $row->price . " zł</p>";
        echo "<p>Ilość w magazynie: " . $row->quantity . "</p></div>";
      }
    }
    ?>
  </div>

</main>

<?php
include_once "components/footer.php";
include_once "components/foot.php";
?>