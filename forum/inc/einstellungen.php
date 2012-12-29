<fieldset class="div2"><legend>Profilbild</legend>
<form action="?seite=einstellungen" method="post" enctype="multipart/form-data">
<input type="file" name="datei"><br>
<input type="submit" value="Hochladen">
</form>
<?php
if(isset($_FILES['datei'])){
    
$dateityp = GetImageSize($_FILES['datei']['tmp_name']);
if($dateityp[2] != 0)
   {

   if($_FILES['datei']['size'] <  102400)
      {
      $path_parts = pathinfo($_FILES['datei']['tmp_name']);
      move_uploaded_file($_FILES['datei']['tmp_name'], "./benutzerbilder/".$_SESSION['user_id'].".png");
      echo "Das Bild wurde Erfolgreich hochgeladen";
      }

   else
      {
         echo "Das Bild darf nicht größer als 100 kb sein ";
      }

    }

else
    {
    echo "Bitte nur Bilder im png Format hochladen";
    }
}
?>
</fieldset>





<fieldset class="div2"><legend>Geschlecht</legend>
<form action="?seite=einstellungen" method="post" enctype="multipart/form-data">
<select name="geschlecht">
<option value="0">Nicht Angegeben</option>
<option value="1">M&auml;nnlich</option>
<option value="2">Weiblich</option>
</select>
<input type="submit" value="Speichern">
</form>
<?php
if(isset($_POST['geschlecht'])){
$abbfrage = "UPDATE `fensta_forum`.`benutzer` SET `geschlecht` = '{$_POST['geschlecht']}' WHERE `benutzer`.`id` = {$_SESSION['user_id']};";
mysql_query($abbfrage);
echo "<h2>gespeichert</h2>";

}
?>
</fieldset>