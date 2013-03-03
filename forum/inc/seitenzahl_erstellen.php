<?php
function adolf($sql_in,$sql_count,$link){

    $sql = $sql_count;
    $result = mysql_query($sql) OR die("<pre>\n".$sql."</pre>\n".mysql_error());
    $anzahl = mysql_result($result, 0);

    if (!$anzahl) {
        return "Es befinden sich keine Daten in der Tabelle.\n";
    }
    else {
    // Festlegen der aktuellen Seite
    $start = isset($_GET['page_number'])?(int)$_GET['page_number']:1;
    // Festlegen der Anzahl der angezeigten Datens�tze
    $per_page = isset($_GET['per_page'])?(int)$_GET['per_page']:10;
    if ($per_page != 5 AND $per_page != 10 AND $per_page != 20){   
        $per_page = 10;} 
    // Berechnung der Seitenzahlen = Alle Datens�tze geteilt durch Datens�tze pro Seite
        $num_pages = ceil($anzahl/$per_page);
     
    // �berpr�ft, ob eine m�gliche Seitenzahl �bergeben wurde
    if ($start < 1)
        $start = 1;
    if ($start > $num_pages)
        $start = $num_pages;
    return "<table>\n";
    return " <tr>\n";
    return "  <td style=\"text-align:left\">\n";
    return "<b>Es sind ".$anzahl." Daten in der Datenbank</b>\n";
    return "  </td>\n";
    // Daten pro Seite
    // F�r die aktuelle 'Daten-pro-Seite'-Zahl wird kein Link erzeugt
    return "  <td style=\"text-align:right\">\n";
    return "Daten pro Seite: ";
    if ($per_page != 5)
        return "<a href=\"".$link."&per_page=5&page_number=".$start."\">5</a> \n";
    else
        return "5\n";
    if ($per_page != 10)
        return "<a href=\"".$link."&per_page=10&page_number=".$start."\">10</a> \n";
    else
        return "10\n";
    if ($per_page != 20)
        return "<a href=\"".$link."&per_page=20&page_number=".$start."\">20</a> \n";
    else
        return "20\n";
    return "  </td>\n";
    return " </tr>\n";
    return "</table>\n";

    // Seitenzahlen
    return "<table>\n";
    return " <tr>\n";
    return "  <td style=\"width:50px;\">\n";
    return "Seite: \n";
    return "  </td>\n";
    return "  <td>\n";
    // Pr�ft, ob die Anzeige von "<" sinnvoll ist
    if ($start != 1)
        return "<a href=\"".$link."&per_page=".$per_page."&page_number=".($start-1)."\">&lt;</a>&nbsp\n";
    for($i=1; $i<=$num_pages; $i++) {
        // F�r die aktuelle Seite wird kein Link erzeugt..
        if ($i==$start)
            return $i."\n";
        // F�r alle anderen schon.
        else
            return "<a href=\"".$link."&per_page=".$per_page."&page_number=".$i."\">".$i."</a>\n";
    }
    // Pr�ft, ob die Anzeige von ">" sinnvoll ist
    if ($start != $num_pages)
        return "&nbsp<a href=\"".$link."&per_page=".$per_page."&page_number=".($start+1)."\">&gt;</a> \n";
    return "  </td>\n";
    return " </tr>\n";
    return "</table>\n";

        $offset = ($start-1)*$per_page;

    $neu_befehl = $sql_in ."LIMIT $offset , $per_page";
   return $neu_befehl;
    
}

}

?>