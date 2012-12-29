<?php
@session_start();
if(isset($_SESSION['user_name'],$_POST['forum_id'])){
 ?>

  <form action="inc/speichern.php" method="post" onsubmit="return neues_thema_speichern(this);">
<input type="hidden" name="forum_id" value="<?php echo $_POST['forum_id'] ?>">
  
  <div class="toolbar" id="toolbar1"><label>Name:<input type="text" name="titel"></label></div><?php include("editor/editor.inc.htm") ?>

  <!-- 'Editor Bereich Ende' -->
  <hr />
  <button type="submit">Speichern</button>&nbsp; 
  <button type="reset" onclick="delfenster('neues_thema')">Abbrechen</button>  
  </form>
  <?php 
  }
  else{
    echo "<h1>Du musst eingeloggt sein um eintr&auml;ge schreiben zu k&ouml;nnen</h1>";
    echo "<hr />";
    echo "<button type=\"button\" onclick=\"delfenster('neues_thema')\">Abbrechen</button>";
}
   ?>