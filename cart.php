<?php
include_once "components/head.php";
include_once "components/header.php";
include_once "components/nav.php";

if (isset($_POST['product'])) {
  if (!isset($USER_DATA['Cart'])) {
    $USER_DATA['Cart'] = [];
  }
  array_push($USER_DATA['Cart'], $_POST['product']);
}
$count_cart = count($USER_DATA['Cart']);
$cart_array = $USER_DATA['Cart'];
$conn = connect();

?>
<section>

<?php
  for ($i = 0; $i < $count_cart; $i++) {
    $q1 = "SELECT * FROM `products` WHERE product_id = '$cart_array[$i]'";
    $res = $conn->query($q1);

    while($row = $res->fetch_object()){
      echo $row->product_id;
      echo $row->quantity;
      echo $row->name . "<br><br>";  
    }

    
  }

  ?>


</section>

<?php
include_once "components/foot.php";
?>