<?php
function adolf($sql_in,$sql_count,$link){

    $sql = $sql_count;
    $result = mysql_query($sql) OR die("<pre>\n".$sql."</pre>\n".mysql_error());
    $anzahl = mysql_result($result, 0);

    if (!$anzahl) {
        echo "Es befinden sich keine Daten in der Tabelle.\n";
    }
    else {
    // Festlegen der aktuellen Seite
    $start = isset($_GET['page_number'])?(int)$_GET['page_number']:1;
    // Festlegen der Anzahl der angezeigten Datensätze
    $per_page = isset($_GET['per_page'])?(int)$_GET['per_page']:10;
    if ($per_page != 5 AND $per_page != 10 AND $per_page != 20){   
        $per_page = 10;} 
    // Berechnung der Seitenzahlen = Alle Datensätze geteilt durch Datensätze pro Seite
        $num_pages = ceil($anzahl/$per_page);
     
    // Überprüft, ob eine mögliche Seitenzahl übergeben wurde
    if ($start < 1)
        $start = 1;
    if ($start > $num_pages)
        $start = $num_pages;
    echo "<table>\n";
    echo " <tr>\n";
    echo "  <td style=\"text-align:left\">\n";
    echo "<b>Es sind ".$anzahl." Daten in der Datenbank</b>\n";
    echo "  </td>\n";
    // Daten pro Seite
    // Für die aktuelle 'Daten-pro-Seite'-Zahl wird kein Link erzeugt
    echo "  <td style=\"text-align:right\">\n";
    echo "Daten pro Seite: ";
    if ($per_page != 5)
        echo "<a href=\"".$link."&per_page=5&page_number=".$start."\">5</a> \n";
    else
        echo "5\n";
    if ($per_page != 10)
        echo "<a href=\"".$link."&per_page=10&page_number=".$start."\">10</a> \n";
    else
        echo "10\n";
    if ($per_page != 20)
        echo "<a href=\"".$link."&per_page=20&page_number=".$start."\">20</a> \n";
    else
        echo "20\n";
    echo "  </td>\n";
    echo " </tr>\n";
    echo "</table>\n";

    // Seitenzahlen
    echo "<table>\n";
    echo " <tr>\n";
    echo "  <td style=\"width:50px;\">\n";
    echo "Seite: \n";
    echo "  </td>\n";
    echo "  <td>\n";
    // Prüft, ob die Anzeige von "<" sinnvoll ist
    if ($start != 1)
        echo "<a href=\"".$link."&per_page=".$per_page."&page_number=".($start-1)."\">&lt;</a>&nbsp\n";
    for($i=1; $i<=$num_pages; $i++) {
        // Für die aktuelle Seite wird kein Link erzeugt..
        if ($i==$start)
            echo $i."\n";
        // Für alle anderen schon.
        else
            echo "<a href=\"".$link."&per_page=".$per_page."&page_number=".$i."\">".$i."</a>\n";
    }
    // Prüft, ob die Anzeige von ">" sinnvoll ist
    if ($start != $num_pages)
        echo "&nbsp<a href=\"".$link."&per_page=".$per_page."&page_number=".($start+1)."\">&gt;</a> \n";
    echo "  </td>\n";
    echo " </tr>\n";
    echo "</table>\n";

        $offset = ($start-1)*$per_page;

    $neu_befehl = $sql_in ."LIMIT $offset , $per_page";
   return $neu_befehl;
    
}

}

?>