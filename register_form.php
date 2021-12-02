<?php
include_once "components/head.php";
include_once "components/header.php";
include_once "components/nav.php";
?>

<main>
  <div class="form">
    <form method="POST" action="register.php">
    <input type="text" name="name" placeholder="Imie">
      <input type="text" name="last_name" placeholder="Nazwisko">
      <input type="text" name="login" placeholder="Login">
      <input type="password" name="pass" placeholder="Hasło">
      <input type="password" name="pass2" placeholder="Powtórz hasło">
      <input type="email" name="mail" placeholder="e-mail">
      <a href="register_form.html">Nie masz konta? Zarejestruj się</a>
      <input type="submit" value="Zarejestruj" class="send">
    </form>
  </div>
</main>

<?php
include_once "components/foot.php";
?>