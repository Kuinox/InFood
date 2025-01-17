/*exported filterClicked, tabClick, searchOnFly*/
"use strict";
window.filter = {};

function filterClicked(div) {
    getFilterById(div.id);
}


function searchOnFly(input) {
    var search = input.childNodes[1].value;
    var type = getType();
    querySearch(search, type);
}

function tabClick(element) {
    //TODO special case (grade nutri)
    tabHighLight(element);
}

function tabHighLight(element) {
    var tabs = element.parentNode.childNodes;
    for (var i = 0; i<tabs.length; i++) {
        if(tabs[i] === element) {
            element.classList.add("active");
        } else {
            tabs[i].classList.remove("active");
        }
    }
}

function numMaxProperties(data) {
    var max = 0;
    data = data.data;
    for (var i=0; i<data.length; i++) {
        var length = data[i].length;
        if (length > max) {
            max = length;
        }
    }
    return max;
}

function displaySimpleContent(data, filter) {
    document.getElementsByClassName("filter-title")[0].innerHTML = "<div onclick='modifyTitle()' class='filter-button' style='border-color:filter.color'>"+data.name+"</div>";
    document.getElementsByClassName("color-picker")[0].innerHTML = filter.color;
}

function unHide() {
    var hiddenList = document.getElementsByClassName("normalHidden");
    var z;
    for (var x=0; x<4; x++) {
        for (z=0; z<hiddenList.length; z++) {
            hiddenList[z].classList.remove("normalHidden");
        }
    }
}

function displayFilter(json) {
    var filter = JSON.parse(json);
    var data = JSON.parse(filter.json);
    displayFilterData(data);
    displaySimpleContent(data, filter);
    unHide();
}
function getType() {
    var type = document.getElementsByClassName("active");
    for (var i=0; i<type.length; i++) {
        if (type[i].tagName === "TD") {
            return type[i].id;
        }
    }
}

function getTypeSearchName() {
    var type = getType();
    switch(type) {
        case "aliment":
            return "name_aliment";
        case "generic_name":
        case "manufacturing_place":
            return "label";
        default:
            return "name";
    }
}
function displaySearch(search) {
    var div = document.getElementsByClassName("search-results")[0];
    var searchHtml = "";
    for (var i = 0; i<search.length; i++) {
        searchHtml += search[i][getTypeSearchName()]+"</br>";
    }
    console.log(searchHtml);
    div.innerHTML = searchHtml;
    console.log(div);
}

function querySearch(search, type) {
    var xhr = new XMLHttpRequest(); //instancie l'objet xhr
    var url = window.location.href;
    var send = "recherche="+search+"&type="+type+"&debut=";
    var dir_name =  url.split("/")[0]+"//"+url.split("/")[2]+"/"+url.split("/")[3];
    console.log(send);
    xhr.open("GET", dir_name+"/controller/ajax/search.php?"+send); //ouvre la connexion
    //xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send();//envoie
    window.filter.timer = setInterval(function(){
        if(xhr.readyState === XMLHttpRequest.DONE) {
            clearInterval(window.filter.timer);
            window.filter.timer = null;
            var response = xhr.response;
            console.log(response);
            displaySearch(JSON.parse(response));
         }
     }, 10, 10);

}

function displayFilterData(data) {
    var table = document.getElementById("table-filter");
    document.getElementsByClassName("table-title")[0].childNodes[0].classList.add("active");
    for (var t=0; t<table.childNodes.length; t++) {



        if(t>1) {
            table.removeChild(table.childNodes[t]);
        }
    }
    var max = numMaxProperties(data);
    var td;
    var tr;
    for (var y=0; y<max; y++) {
        tr = document.createElement("tr");
        for (var x=0; x<data.data.length; x++) {
            td = document.createElement("td");
            td.innerHTML = data.data[y][x][0];
            tr.appendChild(td);
        }
        table.appendChild(tr);
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
