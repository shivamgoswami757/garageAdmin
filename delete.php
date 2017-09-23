<?php
$servername = "localhost";
$username = "root";
$password = "123456";
$dbname = "garage_hub";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
for ($i = 84; $i <= 84; $i++) {
  $sql = "DELETE FROM `residents` WHERE `id` = ".$i;
  $conn->query($sql);
}
$conn->close();


 ?>
