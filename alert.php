<?php
if (isset($_SESSION['error'])) {
?>
  <div class="notification">
    <?php
    echo $_SESSION['error'];
    unset($_SESSION['error']);
    ?>
  </div>
<?php
}