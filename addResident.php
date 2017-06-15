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

// $sql = "INSERT INTO `garage_hub`.`residents` (`id`, `email`, `name`, `surname`, `date_of_birth`, `access_level`, `balance`, `team`, `project`, `password`, `time_in_garage`, `date_of_registration`) VALUES (NULL, 'ingoilya99@gmail.com', 'Юзверь', 'Ждунович', '2017-03-01', '9', '172564', NULL, 'mdkjshgjfcnb', '11111111', '12345678909876543', '2017-06-14');";
//
//
// if ($conn->query($sql) === TRUE) {
//     echo "New record created successfully";
// } else {
//     echo "Error: " . $sql . "<br>" . $conn->error;
// }

$conn->close();
 ?>

 <div id="addResident">
   <table>
     <tr>
       <th>имя</th>
       <th>фамилия</th>
       <th>почта</th>
       <th>дата рождения</th>
       <th>уровень доступа</th>
       <th>команда</th>
       <th>пароль</th>
     </tr>
     <tr>
       <td><input type="text" name="" value=""></td>
       <td><input type="text" name="" value=""></td>
       <td><input type="email" name="" value=""></td>
       <td><input type="date" name="" value=""></td>
       <td></td>
       <td></td>
       <td></td>
     </tr>
   </table>

 </div>
