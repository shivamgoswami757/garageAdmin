<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>гараж хаб</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,400,900" rel="stylesheet">  <body>
<?php
$type = "админ";
require_once("header.php");
 ?>
   <main >
     <?php require_once("tabs.php"); ?>
     <h1>Таблица резидентов</h1>
     <?php require_once("residentsTable.php"); ?>
     <hr noshade color="#F5F5F5">
     <h1>Добавить резидента</h1>
     <?php require_once("addResident.php"); ?>
   </main>
  </body>
</html>
