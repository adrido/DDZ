<?php /* Diese Daten teilt dir dein Provider mit: */
@session_start();
include("funktionen.php");
if(isset($_POST['name'],$_POST['password'])){
    

$sql = "SELECT `id`,`name`,`passwort`, admin FROM `benutzer` WHERE `name` = \"$_POST[name]\" AND `passwort` = \"$_POST[password]\"";

$result = mysql_query ($sql);  

if (mysql_num_rows ($result) == 0) {

echo "<b style='color:red;'>Login fehlgeschlagen</b><br />";
include("usercontrolle.php");

}

else{

while($row = mysql_fetch_assoc($result)) {



$_SESSION['user_id'] = $row['id'];

$_SESSION['user_name'] = $row['name'];

$_SESSION['user_online'] = true;

$_SESSION['admin'] = $row['admin'];
}
include('usercontrolle.php');
}
}
else{
    echo "fehler benutzername oder passwort wurde nicht eingegeben";
}
?>