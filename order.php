<?php
include_once "components/head.php";
include_once "components/header.php";
include_once "components/nav.php";
$conn = connect();

if (isset($_POST['product'])) {
  if (!isset($USER_DATA['Cart'])) {
    $USER_DATA['Cart'] = [];
  }
  if (isset($_POST['delete'])) {
    unset($USER_DATA['Cart'][$_POST['product']]);
  } else {
    $amount = $_POST['quantity'] ?? $USER_DATA[$_POST['product']] ?? 1;
    $USER_DATA['Cart'][$_POST['product']] = $amount;
  }
}

?>
<section class="">

  <?php
  foreach ($USER_DATA['Cart'] as $k => $v) {
    $q1 = "SELECT * FROM `products` WHERE product_id = '$k'";
    $res = $conn->query($q1);

    $row = $res->fetch_object();
  ?>
    <div class="product_cart">
      <img src="<?= $row->picture_path ?>">
      <div class="cart_info">
        <h3><?= $row->name ?></h3>

        <form action="cart_form.php" method="POST">
          <input type="hidden" value="<?= $row->product_id ?>" name="product">
          <input type="number" value="<?= $v ?>" name="quantity" max="<?= $row->quantity ?>">
          <button type="submit">Zatwierdź ilość produktów</button>
          <button type="submit" name="delete"> Usuń produkt z koszyka </button>
        </form>
      </div>
    </div>
  <?php
  }
  ?>

</section>

<?php
include_once "components/foot.php";
?>