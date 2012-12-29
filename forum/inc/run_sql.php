<?php
function authentifizieren() {
    header('WWW-Authenticate: Basic realm="Test Authentication System"');
    header('HTTP/1.0 401 Unauthorized');
    echo "Bitte geben Sie eine gültige Login-ID und das Passwort für den
        Zugang ein\n";
    exit;
}

include_once("inc/funktionen.php");
if(!isset($_POST['sql'])) die("SQL befehl wurde nicht gefunden");
if(isset($_SERVER['PHP_AUTH_USER'],$_SERVER['PHP_AUTH_PW'])){
    if($_SERVER['PHP_AUTH_USER'] != "admin" || $_SERVER['PHP_AUTH_PW'] != "#!x1Y") authentifizieren();
}
else{
authentifizieren();
}
$abfrage = mysql_query($_POST['sql']);

?>