<?php
@session_start();
include("funktionen.php");
include("dom.php");
if(isset($_SESSION['user_name'],$_POST['titel'],$_POST['forum_id'],$_POST['eintrag'])){
$eintrag = fertigmachen($_POST['eintrag']);    
$username = $_SESSION['user_name'];
$userid = $_SESSION['user_id'];
$sql = "INSERT INTO `themen` (`id`,`name`, `forum_id`) VALUES (NULL, '$_POST[titel]','$_POST[forum_id]')";
mysql_query($sql);
$id = mysql_insert_id();
$sql = "INSERT INTO `beitrag` (`id`, `zeit`, `beitrag`, `thema_id`, autor_id) VALUES (NULL, TIMESTAMP(''), '$eintrag', $id,'$userid')";
mysql_query($sql);
 echo "<h2>Eintrag wurde gespeichert.</h2>";
    echo "<hr />";
    echo "<button type=\"button\" onclick=\"delfenster('neues_thema');location.reload()\">OK</button>";
}
else {
    echo "<h1>Du musst eingeloggt sein um eintr&auml;ge schreiben zu k&ouml;nnen</h1>";
    echo "<hr />";
    echo "<button type=\"button\" onclick=\"delfenster('neues_thema')\">Abbrechen</button>";
}
?>