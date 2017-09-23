<header id="header">

  <img src="res/logo.png" width="50px" height="50px">
  <?php if($_SESSION["type"] === "admin") {
    $header_type = "админ";

  } elseif ($_SESSION["type"] === "resident") {
    $header_type = "резидент";
  }
  ?>
  <span>гараж хаб <?= $header_type ?></span>
</header>
