<?php
include_once "components/head.php";
include_once "components/header.php";
include_once "components/nav.php";
?>

<main>

  <h2 class="subtitle">Oferta specjalna</h2>

  <ul>
  <?php 
    $q1 = "SELECT * FROM `products` WHERE category_id = 13";
    $conn = connect();

    $res = $conn ->query($q1);
    while($row = $res->fetch_object()){
      echo "<li><a class='special-offer' href='product.php?id=$row->product_id'>" . $row->name . "</a></li>";
    }

  ?>
  </ul>




</main>

<?php
include_once "components/footer.php";
include_once "components/foot.php";
?>