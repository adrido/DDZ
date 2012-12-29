<img src="benutzerbilder/<?php echo $_GET['id'] ?>.png" border="2" />
<h1>Profil von<?php 
include('inc/funktionen.php');
  $abfrage = "SELECT `name` FROM `benutzer` WHERE id = $_GET[id]"; 
 $name = mysql_query($abfrage);
 $name = mysql_fetch_array($name);
 echo $name[0];


?>
</h1>