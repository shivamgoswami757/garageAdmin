<div id="residentInfo">
  <!-- <br> -->
<?php
$photoPath = "res/residentPhoto/".$_GET["id"].".png";
if (!file_exists($photoPath)) {
  $photoPath = "res/residentPhoto/default.png";
}
?>
<img id="residentPhoto" src=<?= $photoPath  ?> alt="">
<br>
<img id="residentQR" src="http://qrcoder.ru/code/?%7B%22type%22%3A%22resident%22%2C%22id%22%3A%22<?= $_GET["id"] ?>%22%7D&10&0" alt="">
  <span><?= $_GET["id"] ?></span>

</div>

<?php  ?>
