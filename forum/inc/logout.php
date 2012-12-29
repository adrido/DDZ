<?php 

include("funktionen.php");

@session_start();

$sql = "UPDATE `users` SET `Status` = '0' WHERE `ID` = '$_SESSION[user_id]'";

mysql_query($sql);

session_destroy();
echo "<h1>logout erfolgreich</h1>";

?>

