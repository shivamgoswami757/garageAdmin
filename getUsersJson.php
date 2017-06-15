<?php
header('Content-type: text/html; charset=utf-8');

$link = mysql_connect('localhost', 'root', '123456')
    or die('Не удалось соединиться: ' . mysql_error());
echo 'Соединение успешно установлено';
mysql_select_db('garage_hub') or die('Не удалось выбрать базу данных');
mysql_query("SET NAMES utf8");

$query = 'SELECT * FROM residents';
$result = mysql_query($query) or die('Запрос не удался: ' . mysql_error());

$json = json_encode($result);


echo $json;

while ($line = mysql_fetch_array($result, MYSQL_ASSOC)) {


  $json = json_encode($line);


  echo $json;

}
mysql_free_result($result);


mysql_close($link);

 ?>
