<?php
function i_datum($timestamp){
$vorwenigensec   = mktime(date("H"), date("i")-1, 0, date("m")  , date("d"), date("Y"));
$vor10min        = mktime(date("H"), date("i")-10, 0, date("m")  , date("d"), date("Y"));
$heute         = mktime(0, 0, 0, date("m")  , date("d")-1, date("Y"));
$letztermonat    = mktime(date("H"), date("i"), 0, date("m")-1, date("d"),   date("Y"));
$letztesjahr     = mktime(date("H"), date("i"), 0, date("m"),   date("d"),   date("Y")-1);
if($timestamp >$vorwenigensec){
    return "Vor wenigen sekunden";
}
else if($timestamp >$vor10min){
    return "Vor ". round((time() - $timestamp) /60) ." Minuten";
}
else if($timestamp >$heute){
    return "Heute um ". date("H.i",$timestamp)." Uhr";
    }
else if($timestamp>$letztermonat){
    return "Am ".date("d. F",$timestamp )." um ".date("H.i",$timestamp)." Uhr";    
    }
else{
    return "Am ".date("d. n Y",$timestamp )." um ".date("H.i",$timestamp)." Uhr";
}
}
$abfrage2 = mysql_query("SELECT name FROM `themen` WHERE id = $_GET[id] LIMIT 0 ,1");
$thema_name_gelesen = mysql_fetch_array($abfrage2);
$abfrage3 = mysql_query("SELECT forum_id FROM `themen` WHERE id = $_GET[id] LIMIT 0 ,1");
$forum_id_gelesen = mysql_fetch_array($abfrage3);
$abfrage4 = mysql_query("SELECT name FROM `foren` WHERE id = $forum_id_gelesen[0] LIMIT 0 ,1");
$forum_name_gelesen = mysql_fetch_array($abfrage4);

$geschlechter = array("Nicht Angegeben", "Männlich", "Weiblich");

?>
Sie sind Hier: <a href="index.php">Foren&uuml;bersicht</a> - 
<a href="?seite=unterforum&id=<?php echo $forum_id_gelesen[0]; ?>"><?php echo $forum_name_gelesen[0]; ?></a>&nbsp;-&nbsp;
<a href="?seite=thread&id=<?php echo $_GET['id']; ?>"><?php echo $thema_name_gelesen[0]; ?></a><br />

<?php 
   include("inc/funktionen.php");
   include("inc/seitenzahl_erstellen.php");

   

   $abfrage_o_limit = "
SELECT `benutzer`.`name` as autor, beitrag.id, `beitrag`.beitrag ,UNIX_TIMESTAMP( `beitrag`.`zeit` )as zeit,beitrag.autor_id, `benutzer`.`reg_datum`, `count_beitrage`.`beitraege` , benutzer.geschlecht
FROM beitrag,`benutzer`,count_beitrage 
WHERE benutzer.id = beitrag.autor_id 
AND count_beitrage.benutzer_id = beitrag.autor_id  
AND thema_id = {$_GET['id']}

ORDER BY `beitrag`.`zeit` ASC ";
   $count_sql = "
SELECT count(*)
FROM beitrag
WHERE thema_id = {$_GET['id']}
ORDER BY `beitrag`.`zeit` ASC ";
//script zum anzeigen der Seitenzahl
$link = "?seite=thread&id={$_GET['id']}"; 

    //anzeige der seitenzahl ende
$abfrage = adolf($abfrage_o_limit,$count_sql,$link);
$abfrage = mysql_query($abfrage);
while($row = mysql_fetch_assoc($abfrage)) {
//$abfrage = mysql_query("SELECT name FROM `benutzer` WHERE thema_id = $_GET[id] ORDER BY `beitrag`.`zeit` ASC LIMIT 0 , 1");
?>
<fieldset class='div2'>
<legend>
<a href='?seite=profil&id=$row[autor_id]'><?=$row['autor'] ?></a>
<?php if(@$_SESSION['user_id']==$row['autor_id'] || @$_SESSION['admin']==true) {
?>   
<button onclick='editor.config.actionurl="inc/beitrag.php?modus=update&id=<?=$row['id']?>";editor.create(document.getElementById(<?=$row['id']?>)); this.disabled=true;'>Bearbeiten</button>
<?php
}?> 
<?=i_datum($row['zeit'])?></legend>
<div class="profil">
    <img class='profilbild' src='benutzerbilder/<?=$row['autor_id'] ?>.png'>
    <p>Registriert seit:<?=$row['reg_datum'] ?><br>
    Beitr&auml;ge:<?=$row['beitraege'] ?><br>
    <!-- [boolean online/offline]<br> -->
    <?=$geschlechter[$row['geschlecht']] ?>
    </p>
</div>
 
 <div class='beitrag' id='<?=$row['id']?>'> <?=$row['beitrag']?></div>
 </fieldset>
<?php 


}

?>

<button type="button" onclick="antwort_schreiben(<?php echo $_GET['id']; ?>)">Antworten</button>
<div id="toolbars">
<!-- wird Dynamisch eingefügt -->
</div>
<div id="editor_footer" style="display:none;" class="toolbar"><button onclick="editor.submit();">OK</button><button onclick="editor.exit()">Abbrechen</button></div>

<script>                 
zeige("inc/toolbars.inc.html","toolbars","");
</script>

<iframe id="colorpalette" src="edit-demo/colors2.htm" style="visibility: hidden; position: absolute; left: 0px; top: 0px; height:170px; width:250px; border:0px;"></iframe>
 <?php adolf($abfrage_o_limit,$count_sql,$link); ?>