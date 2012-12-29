<?php

include("funktionen.php");
function fertigmachen($rohtext)  {
    
$text = utf8_decode($rohtext);

$erlaubte_tags = "<h1><h2><h3><h4><h5><h6><p><a><div><span><font><li><ul><ol><hr><table><tbody><thead><tr><th><td><img><br>";

$text = stripslashes($text);

$text = strip_tags($text, $erlaubte_tags);
      
$dom = new DOMDocument();

$dom -> encoding = 'UTF-8';

if(@$dom -> loadhtml($text) == true){





	for($i = 0 ; $i < $dom->getElementsByTagName("a")->length ; $i++){

		$foundElement = $dom->getElementsByTagName("a")->item($i);

		$link = $foundElement->getAttribute("href");

		$onclick = "return confirm(\"\\tExterne seite\\n\\nSoll die Externe Seite ".$link." Aufgerufen werden?\");";

		$foundElement->setAttribute("onclick",$onclick);

		$foundElement->setAttribute("target","_blank");

	}



$text = $dom -> saveHTML(); 



$text = strip_tags($text, $erlaubte_tags);

$text = addslashes($text);


return $text;
}
}