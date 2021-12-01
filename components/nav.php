<link rel="stylesheet" href="styles/style.css">

<nav id="nav">
  <section class="nav-header">
    <h3>
      Menu</h3><span class="material-icons" id="nav-close">
      lunch_dining
    </span>
  </section>

  <section>
    <!-- Ikonki i linki -->
    <a href="desktops.php"><span class="material-icons">
        computer
      </span>Komputery</a>
    <a href="smartphones.php"><span class="material-icons">
        smartphone
      </span>
      Telefony</a>
    <a href="components.php"><span class="material-icons">
        memory
      </span>
      Podzespoły</a>
    <a href="perypherals.php"><span class="material-icons">
        print
      </span>
      Urządzenia peryferyjne</a>
    <a href="audio.php"><span class="material-icons">
        radio
      </span>
      Audio</a>
    <a href="accessories.php"><span class="material-icons">
        space_dashboard
      </span>Akcesoria</a>
  </section>

</nav>

<script>
  const nav = document.getElementById("nav");
  const navClose = document.getElementById("nav-close");
  const navOpen = document.getElementById("nav-open");

  navClose.addEventListener('click', () => {
    nav.classList.remove('open');
  })

  navOpen.addEventListener('click', () => {
    nav.classList.add('open');
  })
</script>