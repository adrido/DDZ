          <!DOCTYPE html>
<html>

<head>
    <title>Benutzer Verwaltung</title>

    <meta charset="ISO-8859-1">
    <meta name="description" content="Die Enten verwaltung">
    <meta name="author" content="Adrian Doll">
    <meta name="keywords" content="">
    <script>
    function bearbeiten(tabelle){
    tabelle.disabled = true;
    var zeile = tabelle.parentNode.parentNode;
    var id = zeile.childNodes[1].innerHTML;
    var name = zeile.childNodes[3].innerHTML;
    var email = zeile.childNodes[5].innerHTML;
    var admin = zeile.childNodes[7].innerHTML;
    zeile.childNodes[3].innerHTML = "<input type='text' name='name' value='"+name+"'>"; //name eingabefeld
    zeile.childNodes[5].innerHTML = "<input type='text' name='email' value='"+email+"'>";
    zeile.childNodes[7].innerHTML = "<input type='text' name='admin' value='"+admin+"'>";
    }
    </script>
</head>

<body>
<h1>Benutzerverwaltung</h1>
<?php

$MYSQL_HOST = "localhost"; //server addresse zum mysql server

$MYSQL_USER = "fensta_forum"; //anmeldenamen zur datenbank

$MYSQL_PW = "#!x1Y";// zugangspaswort

$MYSQL_DB = "fensta_forum";//Name der datenbank

$conn = mysql_connect($MYSQL_HOST, $MYSQL_USER,$MYSQL_PW); /* verbindet zu MySQL an sich */

mysql_select_db($MYSQL_DB,$conn); /* verbindet zu der gewählten Datenbank auf dem Server */

if(isset($_POST['name'])){
$sql = "INSERT INTO `enten` (`id`, `name`) VALUES (NULL, '$_POST[name]')";
if(mysql_query($sql)){
  echo "Eingef&uuml;gt wurde : $_POST[name]";   
}
else{
    echo "Fehler";
}  
}

$abfrage = mysql_query("SELECT * FROM `benutzer` ORDER BY `id` ASC");
?>
<form method="post" action="entenverwaltung.php" autocomplete="off" >
<table border="1" cellpadding="1" cellspacing="1" summary="">
    <tr>
        <th>id</th>
        <th>Name</th>
        <th>e-mail</th>
        <th>admin</th>
        <th>Aktion</th>
    </tr>
    <?php 
    while($row = mysql_fetch_assoc($abfrage)){
        
     ?>
    <tr>
        <td><?php echo $row['id']; ?></td>
        <td><?php echo $row['name'] ?></td>
        <td><?php echo $row['email'] ?></td>
        <td><?php echo ($row['admin']) ? 'ja' : 'nein' ?></td>
        <td><button type="button">loschen</button> <button type="button" onclick="bearbeiten(this);">bearbeiten</button></td>
    </tr> <?php } ?>
    <!-- <tr>
        <td>#</td>
        <td><input name="name" required="required"/><button type="submit">OK</button></td>
    </tr>  -->
</table>
</form>
</body>
</html>
