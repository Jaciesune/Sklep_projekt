<link rel="stylesheet" href="styles/style.css">

<header>
  <!-- Header, todo: Logo -->
  <section class="menu">
    <span class="material-icons" id="nav-open">
      menu
    </span>
    <a href="index.php"><span class="material-icons home">
        home
      </span></a>

  </section>
  <section class="your_cart">
    <?php
    if (isset($_SESSION['userID'])) {
    ?>
      <a href="logout.php"><span class="material-icons">
          logout
        </span>
        Wyloguj sie
      </a>
      <a href="cart.php"><span class="material-icons">
        shopping_cart
      </span>
      Twój Koszyk</a>
      <a href="user_settings.php"><span class="material-icons">
        settings
      </span>
      Ustawienia
      </a>
    <?php
    } else {
    ?>
      <a href="login_form.php"><span class="material-icons">
          login
        </span>
        Zaloguj sie
      </a>
    <?php
    }
    ?>

  </section>
</header>