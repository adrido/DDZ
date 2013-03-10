<?php
 @session_start();
include("funktionen.php");
include("dom.php");
if(isset($_SESSION['user_name'])){
$content = "";
    if(isset($_POST['eintrag'],$_GET['id'],$_GET['modus'])){
    $username = $_SESSION['user_name'];
    $userid = $_SESSION['user_id'];
    $id = $_GET['id'];
    $modus = $_GET['modus'];
    $eintrag = fertigmachen($_POST['eintrag']);
    if($modus=="update"){
        $sql = "UPDATE `beitrag` SET `beitrag` = '$eintrag' WHERE `beitrag`.`id` =$id;"; 
    }
    else if($modus == "newThread"){
        $sql = "INSERT INTO `beitrag` (`id`, `zeit`, `beitrag`, `thema_id`,autor_id) VALUES (NULL, TIMESTAMP(''), '$eintrag', '$id', '$userid')";
    }
    if(isset($sql)){
    mysql_query($sql);

   echo "{";
   echo "status:200,statusText:'Erfolgreich'";
   echo "}";    
    }
    else{
   echo "{
    status:500,statusText:'Fehler: sql ist nicht gesetzt'
    }";    
    }
    }
   else{
   echo "{
    status:500,statusText:'Interner Fehler'
    }";

   }
}
else {
   echo"{
        status:403,statustext:'du bist nicht eingeloggt!'
    }";
}

?>