<!DOCTYPE html>
<?php
session_start();
// if($_SESSION["type"] != "admin") {
//   header("Location: http://109.87.16.167:1010/garageAdmin/registration.php");
// }
?>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="Cache-Control" content="no-cache">
    <title>гараж хаб</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i&amp;subset=cyrillic,cyrillic-ext,latin-ext" rel="stylesheet">
    <link rel="shortcut icon" href="res/favicon.ico" type="image/x-icon">

  </head>
  <body>
  <?php require_once("header.php"); ?>

  <main>
    <h1>Про резидента</h1>
    <?php require_once("module/residentInfo.php") ?>
    <hr noshade color="#F5F5F5">
    <?php

    // echo("Профиль резидента номер ".$_GET["id"]);
    // echo "\n".$_SESSION["type"];
    // echo "\n".$_SESSION["id"];
    // echo "\n".$_SESSION["time"];

     ?>
  </main>

  <?php require_once("footer.php"); ?>
  </body>
</html>
