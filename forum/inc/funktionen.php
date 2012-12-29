<?php 

setlocale (LC_TIME,"de_DE"); //Aktiviert die Deutshen Datums Zeit und Wahrungsoptionen


/* Diese Daten teilt dir dein Provider mit: */

$MYSQL_HOST = "localhost"; //server addresse zum mysql server

$MYSQL_USER = "root"; //anmeldenamen zur datenbank

$MYSQL_PW = "root";// zugangspaswort

$MYSQL_DB = "forum";//Name der datenbank

$conn = mysql_connect($MYSQL_HOST, $MYSQL_USER,$MYSQL_PW); /* verbindet zu MySQL an sich */

mysql_select_db($MYSQL_DB,$conn); /* verbindet zu der gew�hlten Datenbank auf dem Server */

//@header('Content-Type: text/html; charset=utf-8');


?>

