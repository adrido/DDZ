<?php
 @session_start();
include("funktionen.php");
include("dom.php");
if(isset($_SESSION['user_name'])){

    if(isset($_POST['eintrag'])){
    $username = $_SESSION['user_name'];
    $userid = $_SESSION['user_id'];
    $id = $_GET['id'];
    $eintrag = fertigmachen($_POST['eintrag']);
    $sql = "UPDATE `fensta_forum`.`beitrag` SET `beitrag` = '$eintrag' WHERE `beitrag`.`id` =$id;";
    mysql_query($sql);

    echo "{";
    echo "status:200,statusText:'Erfolgreich ge&auml;ndert'";
    echo "}";
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