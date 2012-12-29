<?php
function authentifizieren() {
    header('WWW-Authenticate: Basic realm="Administrator bereich"');
    header('HTTP/1.0 401 Unauthorized');
    echo "Bitte geben Sie eine gültige Login-Kennung und das Passwort für den
        Zugang ein\n";
    exit;
}

include_once("inc/funktionen.php");
//if(!isset($_POST['page'])) die("Externer Fehler 1");
if(isset($_SERVER['PHP_AUTH_USER'],$_SERVER['PHP_AUTH_PW'])){
    if($_SERVER['PHP_AUTH_USER'] != "admin" || $_SERVER['PHP_AUTH_PW'] != "#!x1Y") authentifizieren();
}
else{
authentifizieren();
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Administrator Bereich</title>

    <meta charset="ISO-8859-1">
    <meta name="description" content="Der Administrator Bereich von Der Herr der Ringe Das 3. Zeitalter">
    <meta name="author" content="Addi (fensta.bplaced.net)">
    <meta name="keywords" content="Administrator,Bereich,Forenverwaltung">
    <meta name="generator" content="Webocton - Scriptly (www.scriptly.de)">
    <style type="text/css">
	hr.pme-hr		     { border: 0px solid; padding: 0px; margin: 0px; border-top-width: 1px; height: 1px; }
	table.pme-main 	     { border: #004d9c 1px solid; border-collapse: collapse; border-spacing: 0px; width: 100%; }
	table.pme-navigation { border: #004d9c 0px solid; border-collapse: collapse; border-spacing: 0px; width: 100%; }
	td.pme-navigation-0, td.pme-navigation-1 { white-space: nowrap; }
	th.pme-header	     { border: #004d9c 1px solid; padding: 4px; background: #add8e6; }
	td.pme-key-0, td.pme-value-0, td.pme-help-0, td.pme-navigation-0, td.pme-cell-0,
	td.pme-key-1, td.pme-value-1, td.pme-help-0, td.pme-navigation-1, td.pme-cell-1,
	td.pme-sortinfo, td.pme-filter { border: #004d9c 1px solid; padding: 3px; }
	td.pme-buttons { text-align: left;   }
	td.pme-message { text-align: center; }
	td.pme-stats   { text-align: right;  }
</style>
</head>

<body>
<div style="background-color: #ADD8E6;">
Tabelle: 
<a href="benutzer.php">Benutzer</a> 
<a href="foren.php">Foren</a> 
<a href="themen.php">Themen</a>
<a href="beitrag.php">Beitr&auml;ge</a>

</div>

