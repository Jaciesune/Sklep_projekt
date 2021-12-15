<?php
include_once "components/head.php";
include_once "components/header.php";
include_once "components/nav.php";
$conn = connect();

if (isset($USER_DATA['Cart']))
  foreach ($USER_DATA['Cart'] as $product => $ilosc) {
    $q = "UPDATE products SET quantity = quantity-$ilosc WHERE product_id = $product";
    $res = $conn->query($q);
    unset($USER_DATA['Cart']);
  }

header('Location: index.php');
include_once "components/foot.php";
