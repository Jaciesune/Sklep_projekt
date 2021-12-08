<?php
include_once "components/head.php";
include_once "components/header.php";
include_once "components/nav.php";
?>

<main>
  <div class="form">
    <form method="POST" action="register.php" id="form">
      <input type="text" name="name" placeholder="Imie" id="name" pattern="^[^0-9]+$" title="Nie może zawierać cyfr" required>
      <input type="text" name="last_name" placeholder="Nazwisko" id="last_name" pattern="^[^0-9]+$" title="Nie może zawierać cyfr" required>
      <input type="text" name="login" placeholder="Login" id="username" required>
      <input type="password" name="pass" placeholder="Hasło" id="pass" minlength="8" required>
      <input type="password" name="pass2" placeholder="Powtórz hasło" id="pass2" minlength="8" disabled>
      <input type="email" name="mail" placeholder="e-mail" id="email" required>
      <input type="text" name="phone_number" placeholder="Numer telefonu" id="phone_number" pattern="^[0-9]{9}$">
      <select name="woj" id="woj" required>
        <option value='dolnośląskie'>Dolnośląskie</option>
        <option value='kujawsko-pomorskie'>Kujawsko-pomorskie</option>
        <option value='lubelskie'>Lubelski</option>
        <option value='lubuskie'>Lubuski</option>
        <option value='łódzkie'>Łódzki</option>
        <option value='małopolskie'>Małopolskie</option>
        <option value='mazowieckie'>Mazowieckie</option>
        <option value='opolskie'>Opolski</option>
        <option value='podkarpackie'>Podkarpackie</option>
        <option value='pomorskie'>Pomorskie</option>
        <option value='śląskie'>Śląski</option>
        <option value='świętokrzyskie'>Świętokrzyskie</option>
        <option value='warmińsko-mazurskie'>Warmińsko-mazurskie</option>
        <option value='wielkopolskie'>Wielkopolski</option>
        <option value='zachodniopomorskie'>Zachodniopomorskie</option>
      </select>
      <input type="text" name="city_name" placeholder="Nazwa miasta" id="city_name" pattern="^[^0-9]+$" title="Nie może zawierać cyfr" required>
      <input type="text" name="street_name" placeholder="Nr ulicy" id="st_nr">
      <input type="text" name="house_nr" placeholder="Numer domu" id="home_nr">
      <input type="text" name="apart_nr" placeholder="Numer mieszkania" id="apart_nr">
      <a href="login_form.html">Masz już konto? Zaloguj się</a>
      <input type="submit" value="Zarejestruj" class="send">
    </form>
  </div>
</main>

<script>
  const pass = document.querySelector('#pass');
  const pass2 = document.querySelector('#pass2');

  pass.addEventListener('keyup', () => {
    pass2.value = pass.value
  })
</script>

<?php
include_once "components/foot.php";
?>