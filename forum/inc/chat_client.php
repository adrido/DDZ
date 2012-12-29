
<?php
@session_start();
require("config.php"); 
$my_link = mysql_pconnect($MYSQL_HOST,$MYSQL_USER,$MYSQL_PW);  //werte aus config.php
mysql_select_db($MYSQL_DB,$my_link);

?>
<!DOCTYPE html>
<html>
<head>
    <title>Ajax Chat</title>
<script type="text/javascript">
<!--
var xml = null;
var ts = "<?=date('Y-m-d H:i:s')?>";
var running = false;
var dl = 0;
function getMsgs()
{
 dl++;
 if(running && dl < 30){return;}
 if(running && dl >= 30 && xml != null){xml.abort();}
 dl = 0;
 running = true;
 if(xml == null)
 {
  if(window.XMLHttpRequest){ xml = new XMLHttpRequest(); }
  else if(window.ActiveXObject)
  {
   try{ xml = new ActiveXObject('Msxml2.XMLHTTP'); }
   catch(e1)
   {
    try{ xml = new ActiveXObject('Microsoft.XMLHTTP'); }
    catch(e2){}
   }
  }
 }

 if(xml != null)
 {
  xml.open('GET','chat_server.xml.php?ts='+escape(ts),true);
  xml.onreadystatechange = fillMsgs;
  xml.send(null);
 }
}

var f = null;
function fillMsgs()
{
 if(f == null){ f = document.getElementById('first');}
 if(xml.readyState == 4){running = false;}
 if(xml.readyState == 4 && xml.status == 200)
 {
  d = document.getElementById('msgs');
  x = xml.responseXML.documentElement;
  for(i=0;i<x.childNodes.length;i++)
  {
   itm = x.childNodes.item(i);
   if(itm.nodeType == 1)
   {
    name = itm.getAttribute('un');
    ts = itm.getAttribute('ts');
    color = itm.getAttribute('color');
    txt = '';
    for(j=0;j<itm.childNodes.length;j++)
    {
     txt += itm.childNodes[j].nodeValue;
    }

    e = document.createElement('p');
    e.innerHTML = '&lt;'+name+' um '+ts+'&gt; '+txt;
    e.style.color = color;
    e.style.margin = '2px';
    d.insertBefore(e,f);
    f = e;
   }
  }
 }
}
window.setInterval('getMsgs()',1000);  //alle 1 sec neue anchrichten abrufen


function sendMsg()
{
 var sender = null;
 if(window.XMLHttpRequest){ sender = new XMLHttpRequest(); }
 else if(window.ActiveXObject)
 {
  try{ sender = new ActiveXObject('Msxml2.XMLHTTP'); }
  catch(e1)
  {
   try{ sender = new ActiveXObject('Microsoft.XMLHTTP'); }
   catch(e2){}
  }
 }

 if(sender != null)
 {
  t = document.form1.say.value;
  document.form1.say.value = '';
  document.form1.say.focus();
  sender.open('POST','chat_server.xml.php',true);
  sender.setRequestHeader('Content-Type',
                          'application/x-www-form-urlencoded');

  sender.send('un=<?=(isset($_POST['un'])?
                      urlencode($_POST['un']):
                      'unbekannt')?>'+
              '&color=<?=(isset($_POST['co'])?
                      urlencode($_POST['co']):
                      'black')?>'+
              '&msg='+escape(t));
 }
 return false;
}

//-->
</script>
<style type="text/css">
html, body {
background-color: #AEC8F7;
margin: 5px;
padding: 0;
border: 0px;

}



button.submit{
margin-left:-50px;

}

 div.c-5 {width:100%; border:1px solid #BFBFBF; background-color:white;}
 div.c-4 {width:300px;}
.c-3 {margin:0px; height: 36px!important; width: 100%!important; padding:0px;position: absolute;top: auto;bottom: 0px;left: 0px; display: block; }
 input.c-2 {width:100%; height:30px;border: 0;padding: 0px;}
#msgs {
overflow:scroll; 
border:1px solid #BFBFBF; 
background-color:white; 
position: absolute; 
top: 0px;
left: 0px; 
bottom: 36px; 
right: 0px;
margin: 5px;
margin-bottom: 0px;
}
#form1{
    margin: 5px;
    margin-top: 0px;
}
#steuerung{
    position: absolute; top: 0px;
    right: 0px;
    z-index: 1;
    /* display: none; */
}

</style>
<style>
fieldset {
   background: none repeat scroll 0 0 #EEEEEE;
   border: 1px solid #AAAAAA;
   border-radius: 4px 4px 0 0;
   box-shadow: 1px 1px 2px #FFFFFF inset;
   margin-top: 1em;
   padding: 1.5em;
   text-shadow: 0 1px 0 #FFFFFF;
}
fieldset legend {
   background-color: #FFFFFF;
   border: 1px solid #AAAAAA;
   border-radius: 2px 2px 2px 2px;
   box-shadow: 3px 3px 15px #BBBBBB;
   color: #444444;
   font-weight: bold;
   padding: 5px 10px;
}
select {
   background: url("./themes/pmahomme/img/input_bg.gif") repeat scroll 0 0 transparent;
   border: 1px solid #AAAAAA;
   border-radius: 2px 2px 2px 2px;
   box-shadow: 0 1px 2px #DDDDDD;
   color: #333333;
   padding: 3px;
}

img, input, select, button {
   vertical-align: middle;
}

input, select, textarea {
   font-size: 1em;
}
input[type="text"] {
   border: 1px solid #AAAAAA;
   border-radius: 2px 2px 2px 2px;
   box-shadow: 0 1px 2px #DDDDDD;
   color: #555555;
   margin: 6px;
   padding: 4px;
}
input[type="password"] {

   border: 1px solid #AAAAAA;
   border-radius: 2px 2px 2px 2px;
   box-shadow: 0 1px 2px #DDDDDD;
   color: #555555;
   margin: 6px;
   padding: 4px;
}
input[type="submit"] {
   background: -moz-linear-gradient(center top , #FFFFFF, #CCCCCC) repeat scroll 0 0 transparent;
   border: 1px solid #AAAAAA;
   border-radius: 12px 12px 12px 12px;
   color: #111111;
   font-weight: bold;
   margin-left: 14px;
   padding: 3px 7px;
   text-decoration: none;
   text-shadow: 0 1px 0 #FFFFFF;
}
select option{
   border-radius: 3px;
   /* background-color: #AEC8F7; */
}
</style>
</head>

<body>
    <?
    if(isset($_POST['un']))
    {
     ?>
<div id="steuerung">
<a href="splitscreenlinks.html">Splitscreen Links</a>
<a href="splitscreenoben.html">Splitscreen Oben</a>
<a href="splitscreenrechts.html">Splitscreen Oechts</a>
<a href="splitscreenunten.html">Splitscreen Unten</a>
<a href="javascript:document.parent.getElementById('chat').mozRequestFullScreen()">Vollbild</a> 
</div>
            <div id="msgs">
                
                    <p id="first">Hallo <?=$_POST['un']?>
                    , willkommen im Chat!</p>
                
            </div>
            <div class="c-3" style="display: table;">
                <form  style="display: table-row;" autocomplete="off" onsubmit="return sendMsg();" name="form1"  method="post" action="#" id="form1">
                    
                    <input placeholder="Text eingeben" class="c-2" name="say">
                    <div style="width: 40px; display:table-cell;">
                    <button type="submit"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAq9JREFUeNp0U1tIVFEUXefeO+NbUpy0SdSCrI8k0ikjP/zIDyG0IqUCEyoC/agPi4rIIC1ByCJKSCyCyOhhUYJZMIJZjoZj9jA/GtKx1DSjfM44ztx72ueOhQ16YN/XWWudddbZlx283g0wCZzzbJ+KmxrnZnpG4GCMQWJsSJFxiJ5fgGv6d0WAVU07GhFiuJKXkYQNq8P+zv0vIAHv+2ZW1rc5n0+5vedlxkuFKCus7kqTGOzlhamYU4HBKcC3iIBCAvERgFEGSm+/hcZhUWSpS/J4vbd2ZayCh8iOccDlhS4UWOK7mBc4HU88cg6JLinp66Lw0+1fJUhZusS8wAm84GlcheJTVXoBvKRsJADD0kNEK3ACL3iaKokQNXAiGpR5xBKDzStTXnqg4IxOjkERaUgUTJiR9upbhChIRJAJIzN/iAYD8bVIqKqRHPjcnzt6xpI3rjFhhsBagAuZyEZy1/CmCK29NbqgcBscvm0iPLIZclh03Og3T1R+dnoSghX/kmJFYVUHkrOGziI4ftQg0wLs31qC0Oh2zPr6g11umOTvve3OFSmZcfYv06nmmEgkxoaAkQsDWQ0NAiJI4OqzHGxZT0c5B+xItuFl/znERQEDI9iMPZdbhVNz2t7TxVlnng7srLTy39SeE1Qn6j7wrLOdfF8tuH3oGF847EMnecENyl+0Y35Vy3DXvYo6Z9v94vS1y7GMFK89+YjXHd13rWWbLGIrLY4qlFv9RyHuLY5KfauKyzWtH1FORdOkZ9aTe2B7CqoaP6HRaqu1VReVHb6DwfFR1PcFIS8+BmhznqLkgb5hwP0Lj1huRdO/JtFU6i36uUZ6Xh1596Dyce4F+3BsogW1BUjIv4hLIdHYLX5UsaAgPzyOksDGS5u/O6gmA+YSqEwL3seovv4RYAC14jXnL8FFmwAAAABJRU5ErkJggg=="></button>
                </div></form>
            </div>
    <?
    }
    else
    {
     ?>

    <div class="c-5">
        <div class="c-4">
            <form method="post" action="">
                <table>
                    <tr>
                        <td><b>Dein Username:</b></td>

                        <td><input type="text" name="un" value="<?php echo @"$_SESSION[user_name]"; ?>"></td>
                    </tr>

                    <tr>
                        <td><b>Deine Farbe:</b></td>

                        <td><select name="co">
                            <option value="#000000">
                                Schwarz
                            </option>

                            <option value="#0000FF">
                                Blau
                            </option>

                            <option value="#800000">
                                Maroon
                            </option>

                            <option value="#008000">
                                Gr&uuml;n
                            </option>

                            <option value="#800080">
                                Lila
                            </option>
                        </select></td>
                    </tr>
                </table><input type="submit" value="Beitreten ...">
            </form>
        </div>
    </div><?
     }
    ?>
    </body>
</html>