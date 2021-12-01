<?php
include_once "components/head.php";
include_once "components/header.php";
include_once "components/nav.php";
?>

<main>
  <div class="form">
    <form method="POST" action="login.php">
      <input type="text" name="login" placeholder="login">
      <input type="text" name="pass" placeholder="Hasło">
      <a href="register_form.php">Nie masz konta? Zarejestruj się</a>
      <input type="submit" value="Zaloguj" class="send">
    </form>
  </div>
</main>

<?php
include_once "components/foot.php";
?>