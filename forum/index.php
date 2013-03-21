<?php
include_once ("inc/funktionen.php");
@session_start();

$pfad = "Versteckte Seite";
//fals kein pfad gefunden wurde

/*includieren von der eigentlichen seite*/
switch(@$_GET['seite']) {
	case "anmelden" :
		include ("inc/reg.php");
		break;
	case "logout" :
		include ("inc/logout.php");
		break;
	case "uebersicht" :
		include ("inc/forenubersicht.php");
		break;
	case "unterforum" :
		include ("inc/unterforum.php");
		break;
	case "thread" :
		include ("inc/thread.php");
		break;
	case "profil" :
		include ("inc/profil.php");
		break;
	case "last_post" :
		include ("inc/last_post.php");
		break;
	case "einstellungen" :
		include ("inc/einstellungen.php");
		break;
	default :
		include ("inc/forenubersicht.php");
}

if (!isset($content)) {
	die("<h1>Kompatibilitätsproblem Bitte melden sie sich beim Administrator</h1>");
}
?>
<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="de" lang="de">
	<head>
		<title>Forum</title>

		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<meta name="author" content="Johannes">
		<link rel="stylesheet" href="../css/normalize.css" type="text/css">
		<link rel="stylesheet" href="../css/style.css" type="text/css">
		<link rel="stylesheet" href="../css/fensterstyle_neu.css" type="text/css">
		<script type="text/javascript" src="../js/script.js">			
		</script>
		<script type="text/javascript" src="../js/ajax.js">			
		</script>
		<script type="text/javascript" src="../js/fenster.js">			
		</script>

		
		

	</head>
	<body>
	
		<!-- Gesamt-Navi-Sub-Navi-Main -->
		<div id="Gesamt">

			<!-- Header -->
			<div id="head">

				<div id="flash">
					<object codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,0,0" width="220" height="220" id="Ringschrift-flash" align="middle">
						<param name="allowScriptAccess" value="sameDomain" />
						<param name="allowFullScreen" value="false" />
						<param name="movie" value="../Ringschrift-flash.swf" />
						<param name="quality" value="high" />
						<param name="wmode" value="transparent" />
						<param name="bgcolor" value="#ffffff" />
						<embed src="../Ringschrift-flash.swf" quality="high" wmode="transparent" bgcolor="#ffffff" width="220" height="220" name="Ringschrift-flash" align="middle" allowScriptAccess="sameDomain" allowFullScreen="false" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer"></embed>
					</object>
				</div>
			</div>

			<!-- navi -->
			<div id="navi">
				<a href="../index.html">STARTSEITE</a>
				<a href="index.html">NEWS</a>
				<a href="index.html">FAKTEN</a>
				<a href="index.html">DOWNLOADS</a>
				<a href="index.html">TEAM</a>
				<a href="index.php">FORUM</a>
			</div>
			<div id="boardcontent">
				<div id="login">
					<a href="../index.html">Startseite</a> &gt; <a href="index.php">Forum</a> &gt; <?php echo $pfad
					?>
					<?php include("inc/usercontrolle.php")
					?>
					
				
				</div>
				<div id="unter_login">
					<div class="dunkel">
						<a href="index.php?seite=anmelden">Registrieren</a>
					</div>
					<br>
				</div>
				<div id="willkommen">
					<h3>Herzlich Willkommen im Forum des dritten Zeitalters!</h3>

					Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy http://www.hqboard.net/content.php?5-hdrhq tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam  At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus
				</div>
				<?php echo $content
				?>

				
			</div>
			<br>
			<br>
			<!-- Schluss Leiste -->
			<div id="end">

				<div id="end-credits">
					<p class="font_5">
						Eine Modifikation f&uuml;r der Herr der Ringe die Schlacht um Mittelerde II, der Aufstieg des Hexenk&ouml;nigs
						*Copyright 2012 Elendur aka Johnny* Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et
						dolore magna aliquyam erat,sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea
						takimata sanctus est Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt
						ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo.
					</p>
				</div>

			</div>
		</div>

	</body>
</html>