<?php
@session_start();

if(isset($_SESSION['user_name'],$_POST['thema_id'])){
 ?>

<form action="inc/antwort_speichern.php" method="post" onsubmit="return neue_antwort_speichern(this)">
  <input type="hidden" name="thema_id" value="<?php echo $_POST['thema_id'] ?>">
   <!-- Editor bereich anfang -->
  
  <?php include("editor/editor.inc.htm") ?>
  
  <!-- 'Editor Bereich Ende' -->  
  <hr />
  <button type="submit">Speichern</button>
  &nbsp; <button type="reset" onclick="delfenster('antworten')">Abbrechen</button>
</form>
<?php 
}
else{
echo "<h1>Du musst eingeloggt sein um eintr&auml;ge schreiben zu k&ouml;nnen</h1>";
    echo "<hr />";
    echo "<button type=\"button\" onclick=\"delfenster('antworten')\">Abbrechen</button>";
    
}
 ?>