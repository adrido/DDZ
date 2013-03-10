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
		<!--<meta name="editor" content="html-editor phase 5">autsch! bitte einen richtigen editor verwenden der 1. keine solchen sachen reinschreibt. und 2. keine so schlechten vorlagen wie dieße bietet -->
		<link rel="stylesheet" href="../css/normalize.css" type="text/css">
		<link rel="stylesheet" href="../css/style.css" type="text/css">
		<link rel="stylesheet" href="../css/fensterstyle_neu.css" type="text/css">
		<script type="text/javascript"src="../js/script.js">			
		</script>
		<script type="text/javascript"src="../js/ajax.js">			
		</script>
		<script type="text/javascript"src="../js/fenster.js">			
		</script>
		<script language="javascript">
			//language ist veraltet!!!! staddessen type="text/javascript"verwenden!
			AC_FL_RunContent = 0;
		</script>
		<script src="../AC_RunActiveContent.js" language="javascript"></script><!--language ist veraltet!!!! staddessen type="text/javascript"verwenden!-->

		<!-- Java Script -Slideshow NEU -->
		<!--<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>-->
		<!-- Google ist Böse! bitte eine locale version auf dem webserver speichern -->
		<script type="text/javascript"src="../js/jquery-1.9.1.min.js">			
		</script>
		<script type="text/javascript" src="../fadeslideshow.js">
			/***********************************************
			 * Ultimate Fade In Slideshow v2.0- (c) Dynamic Drive DHTML code library (www.dynamicdrive.com)
			 * This notice MUST stay intact for legal use
			 * Visit Dynamic Drive at http://www.dynamicdrive.com/ for this script and 100s more
			 ***********************************************/

		</script>

		<script type="text/javascript">
			var mygallery = new fadeSlideShow({
				wrapperid : "fadeshow1", //ID of blank DIV on page to house Slideshow
				dimensions : [980, 500], //width/height of gallery in pixels. Should reflect dimensions of largest image
				imagearray : [["../bilder/Gloin.jpg"], ["../bilder/Sauronsmund.jpg"], ["../bilder/Elrond.jpg"], ["../bilder/Nebelberge.jpg"], ["../bilder/Arwen.jpg"], ["../bilder/Flammen.jpg"] //<--no trailing comma after very last image element!
				],
				displaymode : {
					type : 'auto',
					pause : 3000,
					cycles : 0,
					wraparound : false
				},
				persist : false, //remember last viewed slide and recall within same session?
				fadeduration : 3000, //transition duration (milliseconds)
				descreveal : "ondemand",
				togglerid : ""
			})

		</script>

	</head>
	<!--ein haufen missbilligter attribute
	Bitte entfernen und das design mit css machen um kompatibilitätsprobleme zu vermeiden!
	<body text="#000000"  bgcolor="#000000" link="#0000FF" alink="#FF0000" vlink="#FF0000" onload="runSlideShow()">
	runslideschow produziert einen Fehler:
	ReferenceError: runSlideShow is not defined-->
	<body>
		<!--<a name="TOP"><div id="website"></a>	<==das macht kein sinn! entweder ist das invalides html oder einfach murks oder beides!-->

		<!-- Gesamt-Navi-Sub-Navi-Main --><!-- bitte keine 2 bindestriche verwenden! dies sorgt fuer darstellungsfehlern bei aelteren browsern-->
		<div id="Gesamt">

			<!-- Header -->
			<div id="head">

				<div id="flash">
					<!--Im Film verwendete URLs-->
					<!--Im Film verwendeter Text-->
					<!-- saved from url=(0013)about:internet -->
					<!-- was macht das?  das braucht man doch gar nicht! -->
					<!-- der folgende script verzögert das laden der Seite! -->
					<!--<script language="javascript">
					//veraltet!!!! mime/type fehlt!,  attribut language ist überflüssig!
					if (AC_FL_RunContent == 0) {
					alert("Diese Seite erfordert die Datei \"AC_RunActiveContent.js\".");
					} else {
					AC_FL_RunContent('codebase', 'http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,0,0', 'width', '220', 'height', '220', 'src', '../Ringschrift-flash', 'quality', 'high', 'pluginspage', 'http://www.macromedia.com/go/getflashplayer', 'align', 'middle', 'play', 'true', 'loop', 'true', 'scale', 'showall', 'wmode', 'transparent', 'devicefont', 'false', 'id', 'Ringschrift-flash', 'bgcolor', '#ffffff', 'name', 'Ringschrift-flash', 'menu', 'true', 'allowFullScreen', 'false', 'allowScriptAccess', 'sameDomain', 'movie', '../Ringschrift-flash', 'salign', '');
					//end AC code
					}
					</script>
					<noscript>-->
					<object codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,0,0" width="220" height="220" id="Ringschrift-flash" align="middle">
						<param name="allowScriptAccess" value="sameDomain" />
						<param name="allowFullScreen" value="false" />
						<param name="movie" value="../Ringschrift-flash.swf" />
						<param name="quality" value="high" />
						<param name="wmode" value="transparent" />
						<param name="bgcolor" value="#ffffff" />
						<embed src="../Ringschrift-flash.swf" quality="high" wmode="transparent" bgcolor="#ffffff" width="220" height="220" name="Ringschrift-flash" align="middle" allowScriptAccess="sameDomain" allowFullScreen="false" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer"></embed>
					</object>
					<!--</noscript>-->
				</div>
			</div>

			<!-- navi -->
			<div id="navi">
				<a href="../index.html">startseite</a>
				<a href="index.html">news</a>
				<a href="index.html">fakten</a>
				<a href="index.html">downloads</a>
				<a href="index.html">team</a>
				<a href="index.html">forum</a>
			</div>

			<!--style="filter:alpha(opacity=10); -moz-opacity: 0.10; opacity: 0.10;"-->
			<div id="boardcontent">
				<div id="login">
					<a href="index.php">Forum</a> > <?php echo $pfad
					?>
					<?php include("inc/usercontrolle.php")
					?>
				</div>
				<div id="unter_login">
					<a href="index.php?seite=anmelden">Registrieren</a>
					<br>
				</div>
				<div id="willkommen">
					<h3>Herzlich Willkommen im Forum des dritten Zeitalters!</h3>

					Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy http://www.hqboard.net/content.php?5-hdrhq tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam  At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus
				</div>
				<?php echo $content
				?>

				<div id="fadeshow1"></div>

				<!--
				<div>
				<img src="bilder/Gloin.jpg" alt="Gloin" border="0" width="980" height="500">
				<img src="bilder/Sauronsmund.jpg" alt="Saurons Mund im D&auml;sterwald" border="0" width="980" height="500" name='SlideShow'>
				<img src="bilder/Elrond.jpg" alt="Elrond in Bruchtal" border="0" width="980" height="500">
				<img src="bilder/Nebelberge.jpg" alt="Die Nebelberge" border="0" width="980" height="500">
				<img src="bilder/Arwen.jpg" alt="Arwen" border="0" width="980" height="500">
				<img src="bilder/Flammen.jpg" alt="Zwerg in Flammen" border="0" width="980" height="500">
				</div>
				-->

				<!-- Navigation -->
				<!--
				<div id="sub-navi">
				<p align="center">Navigation</p>
				<hr width="80%">
				<ul>
				<a href="index.html"><li>Test</li></a>
				<a href="index.html"><li>Test</li></a>
				<a href="index.html"><li>Test</li></a>
				</ul>
				</div>
				-->
				<!-- Content -->
				<div id="main">

					<!--
					<p class="font_1" align="center">Willkommen</p>
					<hr width="80%">
					<p class="font_2" align="center">auf der Website zum Gesch�ftsprozess 2012.</p>
					<p class="font_4">Diese Seite soll Ihnen einen Einblick in die Welt von RAID vermitteln.
					Wie ist RAID entstanden, wie verwendet man ein RAID heute, wie ist dessen Funktionsweise, welche unterschiedliche Level gibt es, und wo kommt
					es zum Einsatz. Dies alles und vieles mehr finden Sie auf unserer Seite zum Gesch�ftsprozess, Thema RAID 2012.</p>
					<p align="center"><img src="bilder/festplatten_de.gif"  alt="Festplatte" border="0" width="291" height="205.5"></p>

					<p class="font_4" align="center"><a href="#TOP">TOP</a></p>
					-->

				</div>
			</div>

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
		</div>

	</body>
</html>