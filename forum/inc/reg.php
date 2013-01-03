<?php

include("inc/funktionen.php");

$pfad = "Neuen Account Erstellen";


if(isset($_POST["new_user"],$_POST["new_passwort"],$_POST["new_passwort2"],$_POST["new_email"])){

  $name = htmlentities($_POST[new_user]);

  $pass = htmlentities($_POST[new_passwort]);

  $mail = htmlentities($_POST[new_email]);

  $gibtsschon = mysql_query("SELECT * FROM `benutzer` WHERE (name LIKE '$name' OR email LIKE '$email')");

  $num_rows = mysql_num_rows($gibtsschon);

  if ($num_rows >= 1) {

    $text = "Die e-Mail oder Benutzer Gibt es schon";

	echo $text;

	}

	else{

	$sql = "INSERT INTO `benutzer` (`id`, `name`, `passwort`, `email`, `online`) VALUES (NULL, '$name', '$pass', '$mail', '0');";

	mysql_query($sql);

	


	$content = "<h2>Sie wurden erfolgreich angemeldet</h2>";



	}

}

else{

}


//beginn des here docs
$content = <<<HERE

 <form method="post">

  <h1 align="center">Registrieren</h1>

  

         <div id="regestrieren">

           <label for="benutzername" style="float: left; width: 120px;" >Benutzername:</label>

           <input name="new_user" id="benutzername" type="text" style="background-color:transparent" maxlength="25" /><br />                

          <label for="password" style="float: left; width: 120px;"> Passwort:</label> 

          <input name="new_passwort" id="password" type="password" style="background-color:transparent" maxlength="25" /><br />
          <label for="password" style="float: left; width: 120px;">Passwort Wiederhohlen:</label><input name="new_passwort2" id="password" type="password" style="background-color:transparent" maxlength="25" /><br />

          <label for="e-mail" style="float: left; width: 120px;"> E-Mail Adresse:</label>



  <input name="new_email" id="e-mail" type="text" style="background-color:transparent" maxlength="45"/>

  <button type="submit">OK</button>

  </div>

</form>



HERE;
//ende des here docs

?>