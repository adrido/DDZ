<?php



include("inc/funktionen.php");



$abfrage = mysql_query("SELECT * FROM `foren` WHERE id = $_GET[id] LIMIT 0 , 30");



$abfrage2 = mysql_query("SELECT * FROM `themen` WHERE forum_id = $_GET[id] LIMIT 0 , 30");



/* solang mysql_fetch_assoc() eine Zeile (row) aus der Resource "ziehen" kann ist $row jeweils eine Zeile aus der Datenbank. Und es werden nun einige Elemente des Arrays ausgegeben */

$pfad =  "<a href=\"index.php\">Foren&uuml;bersicht</a> -";


  //der obere kasten



while($row = mysql_fetch_assoc($abfrage)) {
	$pfad .= "<a href='index.php?seite=unterforum&id=$_GET[id]'>$row[name]</a><br /><br />";
	
	$content = "<fieldset class='div2'>";
	$content .= "<legend>$row[name]</legend>";
	$content .= "<img src=\"$row[bild]\"/>";
	$content .=  "<span>".htmlentities($row['beschreibung'])."</span>";
	$content .= "</fieldset>";


}







$content .= "<br />";



//die Einzelenn Themen:



while($row = mysql_fetch_assoc($abfrage2)) {
$content .= "<fieldset class='div2'>";
$content .= "<legend>$row[name]</legend>";
$content .= "<img src=\"$row[bild]\"/>";
$content .= "<a href=\"?seite=thread&id=$row[id]\">";
$content .= "$row[name]</a>";
$anzahl = mysql_query("SELECT * FROM `beitrag` WHERE thema_id = $row[id]"); //rausfinden wievile beitr�ge es gibt.
$neuester_beitrag = mysql_query("
SELECT `benutzer`.`name` AS autor, UNIX_TIMESTAMP( `beitrag`.`zeit` )
FROM `benutzer`
RIGHT JOIN `beitrag` ON benutzer.id = beitrag.autor_id
WHERE thema_id = $row[id]
ORDER BY `beitrag`.`zeit` DESC
LIMIT 0 , 1"
);

$beitrag = mysql_fetch_row($neuester_beitrag);
 $beitrag[0]; // zeit
 $beitrag[1]; // Autor
$content .= "&nbsp;Anzahl Beitr&auml;ge:&nbsp;".mysql_num_rows($anzahl)."<br>neuester Beitrag am ".strftime("%A, %d. %B. %y - %X",$beitrag[1])." von ".$beitrag[0]."";


$content .= "</fieldset>"; 



}


$content .= "<button type=\"button\" onclick=\"neues_thema($_GET[id])\">Neues thema erstellen</button>";
?>

