
<?php
header('Content-type: text/html; charset=utf-8');

$link = mysql_connect('localhost', 'root', '123456')
    or die('Не удалось соединиться: ' . mysql_error());
echo 'Соединение успешно установлено';
mysql_select_db('garage_hub') or die('Не удалось выбрать базу данных');
mysql_query("SET NAMES utf8");

$query = 'SELECT * FROM residents WHERE id='.$_GET["id"];
$result = mysql_query($query) or die('Запрос не удался: ' . mysql_error());

echo "<table>\n";
while ($line = mysql_fetch_array($result, MYSQL_ASSOC)) {
    echo "\t<tr>\n";
    foreach ($line as $col_value) {
        echo "\t\t<td>$col_value</td>\n";
    }
    echo "\t</tr>\n";
}
echo "</table>\n";

mysql_free_result($result);


mysql_close($link);
 ?>
<img src="http://qrcoder.ru/code/?<?= $_GET["id"] ?>&10&0" alt="">
