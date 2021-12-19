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
    <a href="all_products.php"><span class="material-icons">
        view_module
      </span>Lista produktów</a>
    <a href="products_by_category.php"><span class="material-icons">
        category
      </span>
      Szukaj po kategorii
    </a>
    <a href="search.php"><span class="material-icons">
        search
      </span>
      Szukaj</a>
    <?php
    if (isset($_SESSION['userID'])) {
      if ($_SESSION['admin']) {
    ?>
        <a href="management.php"><span class="material-icons">
            construction
          </span>
          Management</a>
    <?php
      }
    }
    ?>
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