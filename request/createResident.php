<?php
$email = $_POST["email"];
$name = $_POST["name"];
$surname = $_POST["surname"];
$date_of_birth = date("Y-m-d", floatval($_POST["dateOfBirth"]) / 1000);
$access_level = $_POST["accessLevel"];
if ($_POST["team"] == "") {
  $team = NULL;
} else {
  $team = $_POST["team"];

}
$password = $_POST["password"];
$date_of_registration = date("Y-m-d", time());
$project = NULL;
$id = NULL;
$balance = "0";
$time_in_garage = "0";



$db_servername = "localhost";
$db_username = "root";
$db_password = "123456";
$dbname = "garage_hub";

$conn = new mysqli($db_servername, $db_username, $db_password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$conn->query("SET NAMES utf8");

$stmt = $conn->prepare("INSERT INTO `garage_hub`.`residents` (`id`, `email`, `name`, `surname`, `date_of_birth`, `access_level`, `balance`, `team`, `project`, `password`, `time_in_garage`, `date_of_registration`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?);");
$stmt->bind_param("ssssssssssss", $id, $email, $name, $surname, $date_of_birth, $access_level, $balance, $team, $project, $password, $time_in_garage, $date_of_registration);
if ($stmt->execute()) {
  echo "OK";
} else {
  echo $email." ".$name." ".$surname." ".$date_of_birth." ".$access_level." ".$team." ".$password." ".(floatval($_POST["dateOfBirth"]) / 1000)." ".$date_of_registration;
}
$stmt->close();
$conn->close();
 ?>
