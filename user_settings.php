<?php
include_once "components/head.php";
include_once "components/header.php";
include_once "components/nav.php";

$conn = connect();
$usr_id = $_SESSION['userID'];
$q1 = "SELECT * FROM users INNER JOIN adressess ON users.adress=adressess.adress_id WHERE user_id = $usr_id";

$res = $conn->query($q1);
$user = $res->fetch_object();

echo $q1;
var_dump($user);
?>

<main>
  <div class="form">
    <form method="POST" action="update_user.php" id="form">
      <input type="text" name="name" placeholder="Imie" id="name" pattern="^[^0-9]+$" title="Nie może zawierać cyfr" required value="<?= $user->name ?>">
      <input type="text" name="last_name" placeholder="Nazwisko" id="last_name" pattern="^[^0-9]+$" title="Nie może zawierać cyfr" required value="<?= $user->family_name ?>">
      <input type="text" name="login" placeholder="Login" id="username" required value="<?= $user->username ?>">
      <input type="password" name="pass" placeholder="Hasło" id="pass" minlength="8" disabled>
      <input type="email" name="mail" placeholder="e-mail" id="email" required value="<?= $user->{'e-mail'} ?>">
      <input type="text" name="phone_number" placeholder="Numer telefonu" id="phone_number" pattern="^[0-9]{9}$" value="<?= $user->phone_number ?>">
      <select name="woj" id="woj" required>
        <?php
        $wojs = [
          'dolnośląskie',
          'kujawsko-pomorskie',
          'lubelskie',
          'lubuskie',
          'łódzkie',
          'małopolskie',
          'mazowieckie',
          'opolskie',
          'podkarpackie',
          'pomorskie',
          'śląskie',
          'świętokrzyskie',
          'warmińsko-mazurskie',
          'wielkopolskie',
          'zachodniopomorskie',
        ];

        function mb_ucfirst($string, $encoding)
        {
          $firstChar = mb_substr($string, 0, 1, $encoding);
          $then = mb_substr($string, 1, null, $encoding);
          return mb_strtoupper($firstChar, $encoding) . $then;
        }

        foreach ($wojs as $woj) {

          $woj_upper = mb_ucfirst($woj, 'utf8');
          if ($woj == $user->wojewodztwo) {
            echo "<option selected value='$woj'>$woj_upper</option>";
          } else {
            echo "<option value='$woj'>$woj_upper</option>";
          }
        }

        ?>
      </select>
      <input type="text" name="city_name" placeholder="Nazwa miasta" id="city_name" pattern="^[^0-9]+$" title="Nie może zawierać cyfr" required value="<?= $user->city_name ?>">
      <input type="text" name="street_name" placeholder="Nr ulicy" id="st_nr" value="<?= $user->street_number ?>">
      <input type="text" name="house_nr" placeholder="Numer domu" id="home_nr" value="<?= $user->house_number ?>">
      <input type="text" name="apart_nr" placeholder="Numer mieszkania" id="apart_nr" value="<?= $user->apartment_number ?>">
      <a href="delete_user.php">Masz już konto? Chciałbyś się go pozbyć?</a>
      <input type="submit" value="Zapisz" class="send">
    </form>
  </div>
</main>

<?php

include_once "components/footer.php";
include_once "components/foot.php";
