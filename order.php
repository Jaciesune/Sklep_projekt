<?php
include_once "components/head.php";
include_once "components/header.php";
include_once "components/nav.php";
$conn = connect();

echo "<h1>Produkty, które kupujesz</h1>";

$price = 0;
foreach ($_POST['product'] as $product => $ilosc) {
  $q = "SELECT name, price FROM products WHERE product_id = $product";
  $res = $conn->query($q);
  $product = $res->fetch_object();
  $price +=floatval($product->price)*$ilosc;
  echo $product->name . "<br>";
}

?>
<form id="formformform">
  <p>Sposób dostawy</p>
  <input type="hidden" name="price" id="price" value="<?= $price ?>">
  <input type="radio" name="delivery" value="8"> Kurier DHL -> 8.00 zł<br>
  <input type="radio" name="delivery" value="6"> Dostawa do najbliższego paczkomatu -> 6.00 zł<br>
  <input type="radio" name="delivery" value="9"> Kurier Inpost -> 9.00 zł
  <p>Metoda płatności: </p>
  <input type="radio" name="payment" value="Karta płatnicza"> Karta<br>
  <input type="radio" name="payment" value="Blik"> Blik<br>
  <input type="radio" name="payment" value="Paypal"> Paypal<br>
  <input type="radio" name="payment" value="[Object object]"> Zbliżeniowo<br>
  <input type="submit" value="Złóż zamówienie">
</form>

<script>
  const form = document.getElementById('formformform')

  form.addEventListener('submit', (e) => {
    e.preventDefault()
    const delivery = Number(document.querySelector('input[name=delivery]:checked').value), payment = document.querySelector('input[name=payment]:checked').value, 
      price = Number(document.getElementById('price').value)
      const output = `Całkowita wartość zakupu: ${(delivery+price).toFixed(2)} zł, Sposób płatności: ${payment}`
      alert(output)
      window.location='erase_cart.php'
  })
</script>

<?php
include_once "components/foot.php";
?>