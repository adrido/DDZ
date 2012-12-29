<?php
 @session_start();
include("funktionen.php");
include("dom.php");
if(isset($_SESSION['user_name'])){
    
    if(isset($_POST['thema_id'],$_POST['eintrag'])){
    $username = $_SESSION['user_name'];
    $userid = $_SESSION['user_id'];
    $id = $_POST['thema_id'];
    $eintrag = fertigmachen($_POST['eintrag']);
    $sql = "INSERT INTO `beitrag` (`id`, `zeit`, `beitrag`, `thema_id`,autor_id) VALUES (NULL, TIMESTAMP(''), '$eintrag', $id,'$userid')";
    mysql_query($sql);

    echo "<h2>Eintrag wurde gespeichert.</h2>";
    echo "<hr />";
    echo "<button type=\"button\" onclick=\"delfenster('antworten');location.reload()\">OK</button>";
    }
   else{
    echo "<h1>Der Eintrag konnt nicht gespeicher werden. fehler 1</h1>";
    echo "<hr />";
    echo "<button type=\"button\" onclick=\"delfenster('antworten')\">Abbrechen</button>"; 
   }
}
else {
    echo "<h1>Du musst eingeloggt sein um eintr&auml;ge schreiben zu k&ouml;nnen</h1>";
    echo "<hr />";
    echo "<button type=\"button\" onclick=\"delfenster('antworten')\">Abbrechen</button>";
}



?>