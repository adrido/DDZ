<?php
$abfrage = "
        SELECT `themen`.`name` AS `thema`,
        `benutzer`.`name` AS `autor`,
        `beitrag`.`zeit`,
        themen.id AS id
        FROM  `beitrag`,`themen`,`benutzer`
        WHERE `beitrag`.autor_id = `benutzer`.`id`
        AND `beitrag`.`thema_id` = `themen`.`id`
        ORDER BY `beitrag`.`zeit` DESC
        LIMIT 0,10";
$ergebniss = mysql_query($abfrage);
while($row = mysql_fetch_assoc($ergebniss)) {
echo "<a href='?seite=thread&id=$row[id]'> $row[zeit] im Thema $row[thema]</a><br />";
}                                               //$row[autor] am
?>