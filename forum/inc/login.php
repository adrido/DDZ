<?php /* Diese Daten teilt dir dein Provider mit: */
@session_start();
include("funktionen.php");
if(isset($_POST['Benutzername'],$_POST['pass'])){
    

$sql = "SELECT `id`,`name`,`passwort`, admin FROM `benutzer` WHERE `name` = \"$_POST[Benutzername]\" AND `passwort` = \"$_POST[pass]\"";

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
    echo "interner fehler 1";
}
?>