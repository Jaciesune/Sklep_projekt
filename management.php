<?php
include_once "components/head.php";
include_once "components/header.php";
include_once "components/nav.php";

$q1 = "SELECT * FROM categories";
$res = $conn->query($q1);

?>
<section class="list_categories">
  <form action="management.php" method="POST">
    <select name="select_cat">
      <option value="" selected></option>
      <?php
      while ($row = $res->fetch_object()) {
        echo "<option value='$row->category_id'>$row->category_name</option>";
      }
      ?>
    </select>
    <input type="submit" name="del" value="Usuń kategorie">
    <input type="text" name="change_val" placeholder="Zmień kategorie">
    <input type="submit" name="change_btn" value="Zmień nazwe kategorii">
    <label for="add_cat">Dodaj kategorię</label>
    <input type="text" name="add_cat_val" id="add_cat" placeholder="Dodaj kategorie">
    <input type="submit" name="add_cat_name" value="Dodaj">

  </form>
  <a href="add_product.php">Dodaj produkt</a>
</section>

<?php

if (isset($_POST['select_cat'])) {
  $id = $_POST['select_cat'];

  if (isset($_POST['del'])) {
    $q2 = "DELETE FROM `categories` WHERE `category_id` = $id";
    $conn->query($q2);
    $_SESSION['error'] = "Usunięto kategorię";
    header("Location: management.php");
  }

  if (isset($_POST['change_btn'])) {
    $change_cat = $_POST['change_val'];
    $q2 = "UPDATE `categories` SET `category_name`='$change_cat' WHERE category_id = $id";
    $conn->query($q2);
    $_SESSION['error'] = "Zmieniono kategorię";
    header("Location: management.php");
  }
}

if (isset($_POST['add_cat_name'])) {
  $add_cat = $_POST['add_cat_val'];
  $q2 = "INSERT INTO `categories`(`category_id`, `category_name`) VALUES (NULL, '$add_cat')";
  $conn->query($q2);
  $_SESSION['error'] = "Dodano kategorie";
  header("Location: management.php");
}


include_once "components/footer.php";
include_once "components/foot.php";
?>