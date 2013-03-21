

<?php

include("inc/funktionen.php");

$abfrage = mysql_query("SELECT * FROM `foren` LIMIT 0 , 30");

$pfad =  "<span>Foren&uuml;bersicht</span> ";

/* solang mysql_fetch_assoc() eine Zeile (row) aus der Resource "ziehen" kann ist $row jeweils eine Zeile aus der Datenbank. Und es werden nun einige Elemente des Arrays ausgegeben */

$content = "<table class='foren'>";
$content .= "<tr>";
$content .= "<th colspan=\"2\">Unterforen</th>";
$content .= "<th>Letzter Beitrag</th>";
$content .= "<th>Themen</th>";
$content .= "<th>Beiträge</th>";
$content .= "</tr>";

while($row = mysql_fetch_assoc($abfrage)) {


$content .= "<tr>";
$content .= "<td><img src='../bilder/symbol.png'></img></td>";

$content .= "<td><a href=\"?seite=unterforum&id=$row[id]\">";

$content .= "$row[name]</a><br>";

$content .= "<span>".htmlentities($row['beschreibung'])."</span>";

$content .= "</td>";

$content .= "<td>{{Titel des unterforums}} <br> von {{autor}} datum</td>";

$content .= "<td>{{ANZAHL THEMEN}}</td>";

$content .= "<td>{{ANZAHL BEITRAEGE}}</td>";

$content .= "</tr>";
}

$content .= "</table>";

?>


