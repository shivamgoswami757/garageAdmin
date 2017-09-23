<?php
session_start();

if (isset($_POST["email"]) && $_POST["email"] == "admin") {
  if ($_POST["password"] == "123456") {
    $_SESSION["type"] = "admin";
    $_SESSION["time"] = time();
    $_SESSION["id"] = "";
    header("Location: http://109.87.16.167:1010/garageAdmin/residents.php");
  } else {
    header("Location: http://109.87.16.167:1010/garageAdmin/registration.php?fail=1");
  }
} elseif (isset($_POST["email"])) {
  //echo $_POST["email"];
  $servername = "localhost";
  $username = "root";
  $password = "123456";
  $dbname = "garage_hub";
  $conn = new mysqli($servername, $username, $password, $dbname);
  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  }
  $sql = "SELECT `id`, `password` FROM `residents` WHERE `email` = '".$_POST["email"]."'";
  //echo $sql;
  $conn->query("SET NAMES utf8");

  $result = $conn->query($sql);
  if ($result != FALSE && $_POST["password"] !== "") {
    if ($result->num_rows == 1) {
      // echo $result->num_rows;
      $person = $result->fetch_assoc();
      // echo "\n".$person["id"];
      // echo "\n".$_POST["password"];
      // echo "\n";
      // echo $result->num_rows;
      if ($person["password"] == $_POST["password"]) {
        $_SESSION["type"] = "resident";
        $_SESSION["time"] = time();
        $_SESSION["id"] = $person["id"];
        header("Location: http://109.87.16.167:1010/garageAdmin/profile.php?id=".$person["id"]);
      } else {
        header("Location: http://109.87.16.167:1010/garageAdmin/registration.php?fail=1");
      }
    } else {
      header("Location: http://109.87.16.167:1010/garageAdmin/registration.php?fail=1");
    }
  } else {
    header("Location: http://109.87.16.167:1010/garageAdmin/registration.php?fail=1");

  }




  $conn->close();
}


 ?>
