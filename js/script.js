
function anmelden(){

var form = document.login;

var name = form.Benutzername.value;

var pass = form.Passwort.value;

var post = "Benutzername="+name+"&pass="+pass+"";

zeige(form.action,"logineingabe",post)
return false;

}

function auswerten(http) {
 if(http.readyState == 4) {
    alert(http.responseText);
    location.reload(); 
 }


}

function neues_thema(id){
    fenster("neues_thema","<b>Neues Thema Erstellen</b>","bitte Warten");
    zeige('neues_thema.php','neues_thema_inhalt','forum_id='+id);
    window.scrollTo(0,0);    
}
function antwort_schreiben(id){
    fenster("antworten","<b>Antwort Schreiben</b>","<div id='new_answer'><h1>Ihre Nachricht</h1><br></div>");
    //zeige("neue_antwort.php","antworten_inhalt","thema_id="+id);
    editor.config.actionurl = "inc/beitrag.php?modus=newThread&id="+id;
    editor.create(document.getElementById('new_answer'));
    window.scrollTo(0,0);
}
function neues_thema_speichern(form){
    var post = "forum_id="+form.forum_id.value;
     post += "&titel="+form.titel.value;
     post += "&eintrag="+document.getElementById("edit").contentWindow.document.body.innerHTML;
    zeige(form.action,'neues_thema_inhalt',post);
    return false;
}
function neue_antwort_speichern(form){
    var post = "thema_id="+form.thema_id.value;
     post += "&eintrag="+document.getElementById("edit").contentWindow.document.body.innerHTML;
    zeige(form.action,'antworten_inhalt',post);
    
    return false;
}

function beitrag_geandert(post){
    response = JSON.parse(this.responseText);
    if(response.status==200){
        editor.exit();
        alert("eintrag erfolgreich geändert");
    }
    else{
        alert("Folgendes Problem ist aufgetreten:\n\n"+response.statusText);
    }   
}
editor = {
    element:null,
    comand:null,
    farbpicker:{},
        }
editor.InitToolbarButtons =function() {
  var kids = document.getElementsByTagName('DIV');

  for (var i=0; i < kids.length; i++) {
    if (kids[i].className == "imagebutton") {
      /* kids[i].onmouseover = tbmouseover;
      kids[i].onmouseout = tbmouseout;
      kids[i].onmousedown = tbmousedown;
      kids[i].onmouseup = tbmouseup; */
      kids[i].onclick = editor.tbclick;
    }
  }
}

editor.tbclick = function()
{
  if ((this.id == "forecolor") || (this.id == "hilitecolor")) {
    editor.command = this.id;
    buttonElement = document.getElementById(this.id);
    document.getElementById("colorpalette").style.left = getOffsetLeft(buttonElement)+"px";
    document.getElementById("colorpalette").style.top = getOffsetTop(buttonElement) + buttonElement.offsetHeight +"px";
    document.getElementById("colorpalette").style.visibility="visible";
  } else if (this.id == "createlink") {
    toggle("link");
  } else if (this.id == "createimage") {
    toggle("bild");

  } else if (this.id == "createtable") {
  toggle("tabelle");

  } else if (this.id == "createsmily") {
  toggle("smily");

  } else {
    document.execCommand(this.id, false, null);
  }
}

editor.Select = function(selectname){
    var cursel = document.getElementById(selectname).selectedIndex;
/* First one is always a label */
if (cursel != 0) {
var selected = document.getElementById(selectname).options[cursel].value;
document.execCommand(selectname, false, selected);
document.getElementById(selectname).selectedIndex = 0;
}
editor.element.focus(); 
}
editor.config = {
    actionurl:"inc/beitrag_aendern.php" 
}
editor.submit = function(){
    var beitrag = editor.element.innerHTML;
    var post = "eintrag="+beitrag;
    getJson(editor.config.actionurl,post,beitrag_geandert);
}
editor.reset = function(){
    editor.element.innerHTML = editor.old_value;
}
editor.exit = function(){
    //editor.element.innerHTML = editor.old_value; //zurücksetzten
    editor.element.contentEditable = false; //editierbar machen entfernen
    var toolbar = document.getElementById("toolbars");
    toolbar.style.display = "none";  //toolbars verbergen.
    var footer = document.getElementById("editor_footer");
    footer.style.display = "none";  //footer ausblenden
    editor.element = null; //editor loschen
}
editor.create = function(elem){
    if(editor.element == null){
    editor.InitToolbarButtons(); //toolbar buttons initialisieren   
    editor.element = elem;
    editor.old_value = elem.innerHTML; 
    elem.contentEditable=true;

    //console.log(elem+"wurde editierbar gemacht");
    var toolbar = document.getElementById("toolbars");
    toolbar.style.display = "block";  //toolbars anzeigen.
    toolbar.style.marginLeft = elem.style.marginLeft;//margin style auch für den editor kopieren
    toolbar.style.marginRight = elem.style.marginRight;
    var parentDiv = elem.parentNode;
    parentDiv.insertBefore(toolbar, elem); //das toolbar Element vor das editor element verschieben.
    var footer = document.getElementById("editor_footer");
    footer.style.display = "block";
    parentDiv.insertBefore(footer, elem.nextSibling);//das footer element nach dem editor element einfügen
    }
    else{
        console.error("Fehler: Es wurde bereits ein Editor Gestartet!"); 
        console.info("In Editor 2.* kann nur 1 Element Gleichzeitig bearbeitet werden");
    }   
return elem;
}
editor.createTable = function (){
    if(document.getElementById("tabelle_anheften").checked!=true)toggle("tabelle");
    e = document.getElementById(editor.element.id);
    rowstext = document.getElementById("table_row").value;//prompt("enter rows");
    colstext = document.getElementById("table_col").value;//prompt("enter cols");
    rows = parseInt(rowstext);
    cols = parseInt(colstext);
    if ((rows > 0) && (cols > 0)) {
      table = document.createElement("table");
      table.setAttribute("border", "1");
      table.setAttribute("cellpadding", "2");
      table.setAttribute("cellspacing", "2");
      tbody = document.createElement("tbody");
      for (var i=0; i < rows; i++) {
        tr =document.createElement("tr");
        for (var j=0; j < cols; j++) {
          if(i==0){
              td = document.createElement("th");
          }
          else{
              td =document.createElement("td");
          }
          
          br =document.createElement("br");
          td.appendChild(br);
          tr.appendChild(td);
        }
        tbody.appendChild(tr);
      }
      table.appendChild(tbody);
      editor.insertNodeAtSelection(table);
    }
}
editor.createImage = function(){
    if(document.getElementById("bild_anheften").checked!=true) toggle("bild");
    imagePath = document.getElementById("bildaddr").value;
    if ((imagePath != null) && (imagePath != "")) {
      execCommand('InsertImage', false, imagePath);
    }

}
editor.createLink = function (){
    if(document.getElementById("link_anheften").checked!=true)toggle("link");
        var szURL = document.getElementById("url").value;
    if ((szURL != null) && (szURL != "")) {
      document.execCommand("CreateLink",false,szURL);
    }
}
editor.insertNodeAtSelection = function (insertNode)
  {
        win = window;
      // get current selection
      var sel = win.getSelection();

      // get the first range of the selection
      // (there's almost always only one range)
      var range = sel.getRangeAt(0);

      // deselect everything
      sel.removeAllRanges();

      // remove content of current selection from document
      range.deleteContents();

      // get location of current selection
      var container = range.startContainer;
      var pos = range.startOffset;

      // make a new range for the new selection
      range=document.createRange();

      if (container.nodeType==3 && insertNode.nodeType==3) {

        // if we insert text in a textnode, do optimized insertion
        container.insertData(pos, insertNode.nodeValue);

        // put cursor after inserted text
        range.setEnd(container, pos+insertNode.length);
        range.setStart(container, pos+insertNode.length);

      } else {


        var afterNode;
        if (container.nodeType==3) {

          // when inserting into a textnode
          // we create 2 new textnodes
          // and put the insertNode in between

          var textNode = container;
          container = textNode.parentNode;
          var text = textNode.nodeValue;

          // text before the split
          var textBefore = text.substr(0,pos);
          // text after the split
          var textAfter = text.substr(pos);

          var beforeNode = document.createTextNode(textBefore);
          afterNode = document.createTextNode(textAfter);

          // insert the 3 new nodes before the old one
          container.insertBefore(afterNode, textNode);
          container.insertBefore(insertNode, afterNode);
          container.insertBefore(beforeNode, insertNode);

          // remove the old node
          container.removeChild(textNode);

        } else {

          // else simply insert the node
          afterNode = container.childNodes[pos];
          container.insertBefore(insertNode, afterNode);
        }

        range.setEnd(afterNode, 0);
        range.setStart(afterNode, 0);
      }

      sel.addRange(range);
  };
editor.farbpicker.selectColor = function(color)

{

execCommand(editor.command, false, color);

document.getElementById("colorpalette").style.visibility="hidden";

//parent.document.getElementById("edit").contentWindow.focus();

}



editor.farbpicker.InitColorPalette = function() {

  var x;

  if (document.getElementsByTagName)

    x = document.getElementsByTagName('TD');

  else if (document.all)

    x = document.all.tags('TD');

  for (var i=0;i<x.length;i++)

  {

    //x[i].onmouseover = over;

    //x[i].onmouseout = out;

    x[i].onclick = click;

  }

}



editor.farbpicker.over = function()

{

this.style.border='2px dotted white';

}



editor.farbpicker.out = function()
{

this.style.border='2px solid transparent';

}

editor.farbpicker.click = function()

{

  selectColor(this.id);

}
