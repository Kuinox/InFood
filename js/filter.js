/*exported filterClicked, search*/
"use strict";
window.filter = {};



function search(search, type) {
    var xhr = new XMLHttpRequest(); //instancie l'objet xhr
    var url = window.location.href;
    var send = "recherche="+search+"&type="+type+"&debut=";
    var dir_name =  url.split("/")[0]+"//"+url.split("/")[2]+"/"+url.split("/")[3];
    xhr.open("GET", dir_name+"/controller/ajax/search.php?"+send); //ouvre la connexion
    //xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send();//envoie
    window.filter.timer = setInterval(function(){
        if(xhr.readyState === XMLHttpRequest.DONE) {
            clearInterval(window.filter.timer);
            window.filter.timer = null;
            console.log(xhr.response);
         }
     }, 10, 10);
    var name;
    switch(type) {
        case "aliment":
            name = "name_aliment";
            break;
        case "generic_name":
        case "manufacturing_place":
            name = "label";
            break;
        default:
            name = "name";
    }
    
}

function getFilterById(id) {
    var xhr = new XMLHttpRequest(); //instancie l'objet xhr
    var url = window.location.href;
    var dir_name =  url.split("/")[0]+"//"+url.split("/")[2]+"/"+url.split("/")[3];
    xhr.open("POST", dir_name+"/controller/ajax/getFilterById.php"); //ouvre la connexion
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    var send = "id="+id;
    xhr.send(send);//envoie
    window.filter.timerId = setInterval(function(){
        if(xhr.readyState === XMLHttpRequest.DONE) {
            clearInterval(window.filter.timerId);
            window.filter.timerId = null;
            console.log(xhr.response);
            displayFilter(xhr.response);
         }
     }, 10, 10);
}
function displayFilter(json) {
    var filter = JSON.parse(json);
    var data = JSON.parse(filter.json);
    document.getElementsByClassName("filter-title")[0].innerHTML = data.name;
    document.getElementsByClassName("color-picker")[0].innerHTML = filter.color;
    document.getElementsByClassName("save")[0].classList.remove("normalHidden");
    document.getElementsByClassName("color-picker")[0].classList.remove("normalHidden");
}
function filterClicked(div) {
    getFilterById(div.id);
}
