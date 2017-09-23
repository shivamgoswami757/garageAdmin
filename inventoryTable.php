<?php
$servername = "localhost";
$username = "root";
$password = "123456";
$dbname = "garage_hub";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT * FROM inventory";
$conn->query("SET NAMES utf8");
$result = $conn->query($sql);
$conn->close();
 ?>


<div id="inventoryTable">
<table>
  <tr>
    <th>id</th>
    <th>имя</th>
    <th>цена</th>
    <th>местопложение</th>
    <th>дата окончания гарантии</th>
  </tr>
  <?php while ($row = $result->fetch_assoc()): ?>
    <tr class="rows" id="row<?= $row["id"] ?>">
      <td><?= $row["id"] ?></td>
      <td class="needToBeCentered"><?= $row["name"] ?></td>
      <td class="needToBeCentered"><?= $row["price"] ?></td>
      <td class="needToBeCentered"><?= $row["location"] ?></td>
      <td class="needToBeCentered"><?= $row["date_of_endwarranty"] ?></td>
    </tr>
  <?php  endwhile;?>
</table>

</div>
