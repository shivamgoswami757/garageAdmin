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

<?php if($_GET["updating"] != "true"): ?>
  <img id="searchLogo" src="res/searchLogo.png"  alt="">
  <input id="searchInput" type="text" name="" value="">

<div id="residentsTable">

<?php endif; ?>

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
  <form id="toProfile" action="profile.php" method="get"  style="display:none">
    <input id="idOfSelectedRow" name="id" >
  </form>

<?php if($_GET["updating"] != "true"): ?>
</div>
<script type="text/javascript">
function loadResidentsTable() {
  console.log("updating");
 var xhttp = new XMLHttpRequest();
 xhttp.onreadystatechange = function() {
   if (this.readyState == 4 && this.status == 200) {
    document.getElementById("residentsTable").innerHTML = this.responseText;
    setOnClickAndSearch();
   }
 };
 xhttp.open("GET", "residentsTable.php?updating=true", true);
 xhttp.send();
}
//setInterval(loadDoc,1000);
</script>
<script type="text/javascript">
var rows;
var toProfile;
var idOfSelectedRow;
var searchInput;
function setOnClickAndSearch() {
  rows = document.getElementsByClassName("rows");
  toProfile = document.getElementById("toProfile");
  idOfSelectedRow = document.getElementById("idOfSelectedRow");
  function rowsOnClick() {
    idOfSelectedRow.value = this.id.slice(3);
    toProfile.submit();
  }
  for (var i = 0; i < rows.length; i++) {
    rows[i].onclick = rowsOnClick;
  }
  searchInput = document.getElementById("searchInput");
  searchInput.oninput = function() {
    for (var i = 0; i < rows.length; i++) {
      if (rows[i].children[1].innerHTML.toLowerCase().indexOf(this.value.toLowerCase()) + 1 ||
          rows[i].children[2].innerHTML.toLowerCase().indexOf(this.value.toLowerCase()) + 1 ||
          rows[i].children[3].innerHTML.toLowerCase().indexOf(this.value.toLowerCase()) + 1 ||
          rows[i].children[4].innerHTML.toLowerCase().indexOf(this.value.toLowerCase()) + 1 ||
          rows[i].children[6].innerHTML.toLowerCase().indexOf(this.value.toLowerCase()) + 1
        ) {
        // rows[i].style.display = "table-row";
        rows[i].style.width = "100%";
        rows[i].style.visibility = "visible";


      } else {
        // rows[i].style.display = "none";
        rows[i].style.visibility = "hidden";


      }
    }
  }
}
setOnClickAndSearch();
</script>
<?php endif; ?>
