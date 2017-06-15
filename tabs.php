<div id="tabs">
<?php if($type == "админ"): ?>
  <table>
    <td>
      <a href="residents.php" class="tabsAnchor">резиденты</a>
    </td>
    <td>
      <a href="#" class="tabsAnchor">столы</a>
    </td>
    <td>
      <a href="#" class="tabsAnchor">инвентарь</a>
    </td>
  </table>

<?php else: ?>


<?php  endif; ?>

</div>



<script type="text/javascript">
var tabsAnchor = document.getElementsByClassName("tabsAnchor");
var str = location.href.toString();
var whereWeAre = str.slice(str.lastIndexOf("/")+1, (str.indexOf("?") !== -1) ? str.indexOf("?")   : undefined);

//whereWeAre = "residents";
switch (whereWeAre) {
  case "residents.php":
    tabsAnchor[0].style.color = "#FF6E40";
    break;
  case "tables.php":
    tabsAnchor[1].style.color = "#FF6E40";
    break;
  case "inventory.php":
    tabsAnchor[2].style.color = "#FF6E40";
    break;
}


</script>
