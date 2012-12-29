<?php
@session_start();
include("funktionen.php");

if(@$_SESSION['user_online'] == true){
     ?>
      <img src="benutzerbilder/<?php echo $_SESSION['user_id'] ?>.png" style="max-height:60px; max-width:60px; float:left" alt="user angemeldet" />
      <h4>Hallo <?php echo "$_SESSION[user_name]"; ?></h4><br />
      <a href="?seite=logout">Ausloggen</a> <?php if($_SESSION['admin']) ?><a href="admin.php?page">Administration</a><?php ; ?>
 <?php        
}
else{
    ?>
    <form action="inc/login.php" onsubmit="this.style.cursor = 'wait'; this.abs.disabled = true ;return anmelden()" name="login">

            <label for="benutzername" style="float: left; width: 120px;" >Benutzername:</label>

           <input name="Benutzername" id="benutzername" type="text" style="background-color:transparent" maxlength="25" /><br />

          <label for="password" style="float: left; width: 120px;"> Passwort:</label>

          <input name="Passwort" id="password" type="password"  maxlength="25"><br>

           <button name="abs" type="submit" style="float:right">Login</button></form>
<?php
}

?>