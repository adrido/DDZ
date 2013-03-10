<?php



include("funktionen.php");



$abfrage = mysql_query("SELECT * FROM `foren` WHERE id = $_GET[id] LIMIT 0 , 30");



$abfrage2 = mysql_query("SELECT * FROM `themen` WHERE forum_id = $_GET[id] LIMIT 0 , 30");



/* solang mysql_fetch_assoc() eine Zeile (row) aus der Resource "ziehen" kann ist $row jeweils eine Zeile aus der Datenbank. Und es werden nun einige Elemente des Arrays ausgegeben */

$pfad =  "<a href=\"index.php\">Foren&uuml;bersicht</a> &gt;";


  //der obere kasten


$content = "";
while($row = mysql_fetch_assoc($abfrage)) {
	$pfad .= "<a href='index.php?seite=unterforum&id=$_GET[id]'>$row[name]</a>";
	
	$content = "<fieldset class='div2'>";
	$content .= "<legend>$row[name]</legend>";
	$content .= "<img src=\"$row[bild]\"/>";
	$content .=  "<span>".htmlentities($row['beschreibung'])."</span>";
	$content .= "</fieldset>";


}







$content .= "<br /><table class='themen'></tbody>";
$content .= "<tr><th colspan='2'>Thema</th><th>Autor</th><th>Antworten</th><th>Letzter Beitrag</th></tr>";


//die Einzelenn Themen:



while($row = mysql_fetch_assoc($abfrage2)) {
$content .= "<tr>";
$content .= "<td><img src=\"$row[bild]\"/></td>";
$content .= "<td>";

$content .= "<a href=\"?seite=thread&id=$row[id]\">";
$content .= "$row[name]</a></td>";
$anzahl = mysql_query("SELECT * FROM `beitrag` WHERE thema_id = $row[id]"); //rausfinden wievile beitr�ge es gibt.
$neuester_beitrag = mysql_query("
SELECT `benutzer`.`name` AS autor, UNIX_TIMESTAMP( `beitrag`.`zeit` )
FROM `benutzer`
RIGHT JOIN `beitrag` ON benutzer.id = beitrag.autor_id
WHERE thema_id = $row[id]
ORDER BY `beitrag`.`zeit` DESC
LIMIT 0 , 1"
);

$erster_beitrag = mysql_query("
SELECT `benutzer`.`name` AS firstautor, UNIX_TIMESTAMP( `beitrag`.`zeit` )
FROM `benutzer`
RIGHT JOIN `beitrag` ON benutzer.id = beitrag.autor_id
WHERE thema_id = $row[id]
ORDER BY `beitrag`.`zeit` ASC
LIMIT 0 , 1"
);
$erster = mysql_fetch_row($erster_beitrag);
 $erster[0]; // zeit
 $erster[1]; // Autor

$beitrag = mysql_fetch_row($neuester_beitrag);
 $beitrag[0]; // zeit
 $beitrag[1]; // Autor

$content .= "<td>$erster[0]</td><td>".mysql_num_rows($anzahl)."</td><td>".strftime("%A, %d. %B. %y - %X",$beitrag[1])." von ".$beitrag[0]."</td>";



$content .= "</tr>"; 



}

$content .= "</tbody></table>"; 


$content .= "<button type=\"button\" onclick=\"neues_thema($_GET[id])\">Neues thema erstellen</button>";
?>

