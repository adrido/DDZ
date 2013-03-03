<?php
@session_start();
include("funktionen.php");

if(@$_SESSION['user_online'] == true){
     ?><div id="login_tabelle">
      <img src="benutzerbilder/<?php echo $_SESSION['user_id'] ?>.png" style="max-height:60px; max-width:60px; float:left" alt="user angemeldet" />
      <h4>Hallo <?php echo "$_SESSION[user_name]"; ?></h4><br />
      <a href="?seite=logout">Ausloggen</a> <?php if($_SESSION['admin']) ?><a href="admin.php?page">Administration</a><?php ; ?>
      </div>
 <?php        
}
else{
    ?>
<form action="inc/login.php" method="post" onsubmit="this.style.cursor = 'wait'; this.submit.disabled = true ;return anmelden()" id = "login_tabelle">
	<!--action="input_text_tabelle.htm" hääää?-->
	<table border="0" cellpadding="0" cellspacing="4" align="right">
		<tr>
			<td align="left">Vorname:</td>
			<td>
			<input name="name" type="text" size="20" maxlength="20">
			</td>
			<td>
			<input type="checkbox" name="Angemeldet_bleiben" value="Angemeldet_bleiben" dissabled="dissabled">
			Angemeldet bleiben</td>
		</tr>
		<tr>
			<td align="left">Password:</td>
			<td>
			<input name="password" type="password" size="20" maxlength="20">
			</td>
			<td>
			<input type="submit" value=" Anmelden" name="submit">
			</td>
		</tr>
	</table>
</form>
<?php
}

?>