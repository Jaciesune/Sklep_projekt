<?php
include_once "components/head.php";
include_once "components/header.php";
include_once "components/nav.php";

$q1 = "DELETE FROM products WHERE product_id = {$_GET['id']}";
$conn->query($q1);
$_SESSION['error'] = "Usunięto produkt";
header("Location: index.php");


include_once "components/footer.php";
include_once "components/foot.php";
?>