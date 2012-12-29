<!DOCTYPE html>
<html><!-- InstanceBegin template="/Templates/vorlage.dwt" codeOutsideHTMLIsLocked="false" -->
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <!-- InstanceBeginEditable name="doctitle" -->
        <title>Anmelden</title>
        <!-- InstanceEndEditable -->
    <link href="../css_datei/format.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="/js/ajax.js"></script>
    <script type="text/javascript" src="/js/script.js"></script>
    <!-- InstanceBeginEditable name="head" --><!-- InstanceEndEditable -->

	
</head>
    
<body background="../Bilder/hindergrund.jpeg">
<!--Leiste oben-->
<div id="logo"></div>
 
<div id="loginbg"></div>
<!--Navi-->
<div id="navibg"></div>
<div id="navibild"></div>
<div id="navi_ueberschrift_bg"></div>
<div id="navi_ueberschrieft"></div>
<div id="navi">
                 <ul><li><a href="anmelden.php">Anmeldung</a></li>
                        <li>Unterpunkt 2</li>
                        <li>Unterpunkt 3</li>
                        <li>Unterpunkt 4</li></ul>
               </div>
<!--login-->
         <div id="logineingabe"><form action="login.php" onsubmit="return anmelden()" name="login">
            <label for="benutzername" style="float: left; width: 120px;" >Benutzername:</label>
           <input name="Benutzername" id="benutzername" type="text" style="background-color:transparent" maxlength="25" /><br />                
          <label for="password" style="float: left; width: 120px;"> Passwort:</label> 
          <input name="Passwort" id="password" type="password"  maxlength="25" /><br />
           Angemeldet bleiben:
<input name="Angem_bleiben" type="checkbox" value="true" /><button type="submit" style="float:right">Login</button></form></div>
<!--bearbeitbarer bereich-->
<div id="inhalt"><!-- InstanceBeginEditable name="EditRegion3" -->
<?php
include("reg.php");
?>
<!-- InstanceEndEditable --> </div>



<!--navi unten-->
                <div id="navi_unten_aus"></div>
<div id="navi_unten_in"  align="center">
                    <a href="http://www.phpkit.com/de/">
                        Diese Website wurde mit PHPKIT WCMS erstellt<br />
                        PHPKIT ist eine eingetragene Marke der mxbyte GbR © 2002-2009</a>                </div>
<a href="http://www.google.de"><div id="download"></div>
</a>
                <a href="http://www.google.de"><div id="team"></div>
</a>
                <a href="http://www.google.de"><div id="ueber_die_Mod"></div>
</a>
                <a href="http://www.google.de"><div id="impressum"></div>
</a>
                <a href="http://www.google.de"><div id="kontakt"></div>
</a>
                <a href="http://www.google.de"><div id="forum"></div>
</a>
</body>
<!-- InstanceEnd --></html>