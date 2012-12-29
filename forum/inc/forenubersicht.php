
<!-- //stern -->

<div ></div>

<!-- //Alles Forum -->

<div>

<!-- //adresse -->



<?php

include("inc/funktionen.php");

$abfrage = mysql_query("SELECT * FROM `foren` LIMIT 0 , 30");

echo "<div><h2>Foren&uuml;bersicht</h2></div> ";

/* solang mysql_fetch_assoc() eine Zeile (row) aus der Resource "ziehen" kann ist $row jeweils eine Zeile aus der Datenbank. Und es werden nun einige Elemente des Arrays ausgegeben */

echo "<div>";

while($row = mysql_fetch_assoc($abfrage)) {



echo "<fieldset class='div2'>";

echo "<legend>$row[name]</legend>";

echo "<img src=\"$row[bild]\"/>";

echo "<a href=\"?seite=unterforum&id=$row[id]\">";

echo "$row[name]</a>&nbsp;";

echo "<span>".htmlentities($row['beschreibung'])."</span>";

echo "</fieldset>";

}

echo "</div>";

?>

</div>

