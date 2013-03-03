/* 
Version: 22.4.2011
Bearbeiter:
Addi

 */
//////////////////////////////////////////////////////////////////

//								//

//Verschiebescript						//

//								//

//////////////////////////////////////////////////////////////////



window.addEventListener("mousemove",doDrag,true)

window.addEventListener("mouseup",stopDrag,true)



var mausX = 0;

var mausY = 0;

var elem = null; // Element, über dem Maus bewegt wurde

var offX = 0; // X-Offset des Elements, das geschoben werden soll

var offY = 0; // Y-Offset des Elements, das geschoben werden soll



function doDrag(event){

if(elem != null){
elem.style.top = (event.clientY - offY)+"px";

elem.style.left = (event.clientX - offX)+"px";

}

else{}

}

function stopDrag() {

elem = null;

offX = 0;

offY = 0;

}
/* 

function getMouseXY(e) {

mausY = e.clientY;

mausX = e.clientX;

doDrag();

}

 */
function startDrag(event,el){
elem = document.getElementById(el);
offY = (event.layerY) ? event.layerY : event.offsetY;
offX = (event.layerX) ? event.layerX : event.offsetX;
}



//////////////////////////////////////////////////////////////////

//								//

//Neues Fenster							//

//								//

//////////////////////////////////////////////////////////////////



function neu_fenster (wert) {
/* 
var text = '<div style="top:50px;left:50px;" id="'+ wert +'" class="fenster">';

text += '<div class="titel"  onmousedown="startDrag(\'' + wert + '\');">';

text += '<span class="text" id="' + wert + '_titel">' + wert + '</span>';

text += '<span style="position: absolute; right: 0px;" class="fenster_titel_x">';

text += '<button type="button" onclick="toggle(\'' + wert + '\');">_</button>';

text += '<button type="button" onclick="maxi(\'' + wert + '\');">|_|</button>';

text += '<button type="button" onclick="delfenster(\'' + wert + '\');">X</button>';

text += '</span></div>';

text += '<div class="inhalt" id="' + wert + '_inhalt">';

text += '</div>';


 */
var text = ""; 
text +=  "    <div class=\"fenster\" id=\""+ wert +"\">";
//text +=  "        <div class=\"resizen c-1\"></div>";
//text +=  "        <div class=\"resizes c-1\"></div>";
//text +=  "        <div class=\"resizew c-2\"></div>";
//text +=  "        <div class=\"resizee c-2\"></div>";
text +=  "        <div class=\"titel\" onmousedown=\"startDrag(event,'" + wert + "');\">";
text +=  "            <span id=\"" + wert +"_titel\">"+wert+"</span>";
text +=  "            <div class=\"buttons\">";
text +=  "                <a href='#' onclick=\"javascript:maxi('"+wert+"');return false\" titel='vollbild'>Vollbild</a>";
text +=  "                <a href='#' onclick=\"javascript:delfenster('"+wert+"');return false\" titel='Dieses fenster schlie&szlig;en'>Schlie&szlig;en</a>";
text +=  "            </div>";
text +=  "        </div>";
text +=  "        <div class=\"inhalt c-3\" id=\"" + wert + "_inhalt\">";
text +=  "        </div>";
text +=  "    </div>";

document.body.innerHTML += text;

//document.getElementById("task_leiste").innerHTML += " <a href=\"javascript:toggle('"+wert+"');\" Id=\""+wert+"_task\"><b>"+wert+"<b></a> ";



}



//////////////////////////////////////////////////////////////////

//								//

//Fensterinhalt festlegen					//

//								//

//////////////////////////////////////////////////////////////////


var loadpict = new Image();
loadpict.src = "Bilder/loading.gif";
function zeige(addr,ziel, post) {

if (window.XMLHttpRequest) { var HTTP = new XMLHttpRequest();} else if (window.ActiveXObject) { try {  var HTTP = new ActiveXObject("Msxml2.HTTP");  }  catch (ex) {   try {   var HTTP = new ActiveXObject("Microsoft.HTTP");   }    catch (ex) {  } }}



var laden = '<img src="Bilder/loading.gif"></img><h3>Die Anfrage wird bearbeitet...</h3>';

 HTTP.open("POST", addr ,true);

 HTTP.onreadystatechange = function() { 

        if (HTTP.readyState == 4) {

              

              document.getElementById(ziel).innerHTML = HTTP.responseText;

              //HTTP = ajaxinit();

            }

        else{ 

              document.getElementById(ziel).appendChild(loadpict);

            }

         }



HTTP.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

//HTTP.setRequestHeader("Content-length", post.length);

HTTP.setRequestHeader("Connection", "close");



 HTTP.send(post);

}



function fenster(name, titel, inhalt) {

 if (document.getElementById(name) == undefined){ //gibt es das fenster?

  neu_fenster(name);				//fals nein erstelle es

  fenster(name, titel, inhalt);		//und prüfe nochmals

 }

  else{						//ansonsten

  document.getElementById(name +"_inhalt").innerHTML = inhalt;

  document.getElementById(name +"_titel").innerHTML = titel;		//wähle das fenster an und plaziere den inhalt

  document.getElementById(name).style.display = '';//und zeige das fenster!

}

}

//////////////////////////////////////////////////////////////////

//								//

//toggle							//

//								//

//////////////////////////////////////////////////////////////////



function toggle(obj) {

	var el = document.getElementById(obj);

	if ( el.style.display != 'none' ) {

		el.style.display = 'none';

	}

	else {

		el.style.display = '';

	}

}



//////////////////////////////////////////////////////////////////

//								//

//maximieren							//

//								//

//////////////////////////////////////////////////////////////////



function maxi(el){

elem =document.getElementById(el).style;

elem.width = "100%";

elem.height = "100%";

elem.top = "0px";

elem.left = "0px";

}



//////////////////////////////////////////////////////////////////

//								//

//schliesen							//

//								//

//////////////////////////////////////////////////////////////////



function delfenster(obj) {

var element = document.getElementById(obj);

while (element.firstChild) {

element.removeChild(element.firstChild); // fensterinhalt wird gelöscht

}

element.parentNode.removeChild(document.getElementById(obj));
/* 
var element = document.getElementById(obj+"_task");

while (element.firstChild) {

element.removeChild(element.firstChild); // fensterinhalt wird gelöscht

}
 */
//element.parentNode.removeChild(document.getElementById(obj+"_task"));

}



function fensterf(addr,titel){

fenster(titel+"_f",titel,"<object type=\"text/html\" id='"+titel+"' data='"+addr+"'></object>");

return false;

}



