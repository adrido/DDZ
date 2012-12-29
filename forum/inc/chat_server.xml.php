<?

require("config.php");

$conn = mysql_connect($MYSQL_HOST, $MYSQL_USER,$MYSQL_PW); /* verbindet zu MySQL an sich */

mysql_select_db($MYSQL_DB,$conn); /* verbindet zu der gewählten Datenbank auf dem Server */

if(isset($_POST['msg']))
{
 $m = htmlentities($_POST['msg']);
 $c = $_POST['color'];
 $u = $_POST['un'];
 mysql_query('INSERT INTO ajax_msg (un, msg, log, color) VALUES ("'.$u.'","'.$m.'",NOW(),"'.$c.'")');
 echo 'Ok';
 exit;
}

$ts = date('Y-m-d H:i:s');
if(isset($_GET['ts'])){$ts = $_GET['ts'];}

header('Content-Type: text/xml');
echo '<?xml version="1.0"?>
<Msglist>
';
$res = mysql_query('SELECT * FROM ajax_msg WHERE log > "'.$ts.'" ORDER BY log ASC');
$num = mysql_num_rows($res);
for($i=0; $i<$num; $i++)
{
 echo '<msg un="'.mysql_result($res,$i,'un').'" ts="'.mysql_result($res,$i,'log').'" color="'.mysql_result($res,$i,'color').'" >'.str_replace('&','&amp;',mysql_result($res,$i,'msg')).'</msg>';
}
echo '</Msglist>';
?>