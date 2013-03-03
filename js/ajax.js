//ajax anfrage diese funktion wählt die gewünschte seite an übergibt dieser die gew�nschten post werte und übergibt das ergebniss bei erfolg an die fertigfunktion.



function anfrage(seite,post,fertigfunktion){//1. Seite 2. Post übergabe 3. funktion die am ende den quellcode bekommt

var HTTP = null;

if (window.XMLHttpRequest) { 

	var HTTP = new XMLHttpRequest();

	} 

		else if (window.ActiveXObject) { 

		try { 

			var HTTP = new ActiveXObject("Msxml2.HTTP"); 

			} 

			catch (ex) { 

				try { 

					var HTTP = new ActiveXObject("Microsoft.HTTP"); 

				} 

			catch (ex) { 

		} 

	}

}

HTTP.open("POST", seite ,true);

HTTP.onreadystatechange = function() { 

	fertigfunktion(HTTP);

	}

	

HTTP.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

HTTP.setRequestHeader("Connection", "close");

HTTP.send(post);

}
function getJson(seite,post,fertigfunktion){//1. Seite 2. Post �bergabe 3. funktion die am ende den quellcode bekommt
var HTTP = new XMLHttpRequest();

//HTTP.onreadystatechange = function() {
//    if (HTTP.readyState == 4) {
//        var bleed = JSON.parse(HTTP.responseText);
//    	fertigfunktion(bleed);
//	}
//	else{
//	   //ansonsten wird die seite gerade geladen
//	}
//}
HTTP.addEventListener("load", fertigfunktion, false);
// progress on transfers from the server to the client (downloads)

HTTP.open("POST", seite ,true);



HTTP.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

HTTP.setRequestHeader("Connection", "close");

HTTP.send(post);

}
    var JSON = {};
    JSON.parse = function(string){
        eval("var objekt = " + string);
        return objekt;
    }
