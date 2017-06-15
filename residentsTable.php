<?php
$servername = "localhost";
$username = "root";
$password = "123456";
$dbname = "garage_hub";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT * FROM residents";
$conn->query("SET NAMES utf8");
$result = $conn->query($sql);
$conn->close();
 ?>

<div id="residentsTable">
  <table>
    <tr>
      <th>id</th>
      <th>имя</th>
      <th>фамилия</th>
      <th>почта</th>
      <th>уровень доступа</th>
      <th>тугрики-попугайчики</th>
      <th>команда</th>
    </tr>
    <?php while ($row = $result->fetch_assoc()): ?>
      <tr class="rows" id="row<?= $row["id"] ?>">
        <td><?= $row["id"] ?></td>
        <td class="needToBeCentered"><?= $row["name"] ?></td>
        <td class="needToBeCentered"><?= $row["surname"] ?></td>
        <td class="needToBeCentered"><?= $row["email"] ?></td>
        <td class="needToBeCentered"><?= $row["access_level"] ?> </td>
        <td class="needToBeCentered"><?= $row["balance"] ?></td>
        <td class="needToBeCentered"><?= $row["team"] ?></td>
      </tr>
    <?php  endwhile;?>
  </table>
  <form id="toProfile" action="profile.php" method="post"  style="display:none">
    <input id="idOfSelectedRow" name="row" >
  </form>
</div>

<script type="text/javascript">
  var rows = document.getElementsByClassName("rows");
  var toProfile = document.getElementById("toProfile");
  var idOfSelectedRow = document.getElementById("idOfSelectedRow");
  function rowsOnClick() {
    idOfSelectedRow.value = this.id.slice(3);
    toProfile.submit();
  }
  for (var i = 0; i < rows.length; i++) {
    rows[i].onclick = rowsOnClick;
  }
</script>
