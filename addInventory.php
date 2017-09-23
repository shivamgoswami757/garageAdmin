<?php

$servername = "localhost";
$username = "root";
$password = "123456";
$dbname = "garage_hub";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$conn->query("SET NAMES utf8");

$sql = "INSERT INTO `garage_hub`.`inventory` (`id`, `name`, `price`, `location`, `date_of_endwarranty`) VALUES (NULL, 'фрезер', '666', 'фаблаб', '2017-07-29');";


if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
 ?>
