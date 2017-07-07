/*exported setCookie, checkCookie*/
"use strict";

function setCookie(cname, cvalue, exdays) {
    var div = document.getElementsByClassName("cookies")[0];
    div.classList.add("cookieHidden");
    var d = new Date();
    d.setTime(d.getTime() + (exdays*24*60*60*1000));
    var expires = "expires="+ d.toUTCString();
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}

function getCookie(cname) {
    var name = cname + "=";
    var decodedCookie = decodeURIComponent(document.cookie);
    var ca = decodedCookie.split(";");
    for(var i = 0; i <ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == " ") { // jshint ignore:line
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) { // jshint ignore:line
            return c.substring(name.length, c.length);
        }
    }
    return "";
}

function checkCookie() {
    var cookie = getCookie("cookieAccept");
    if (cookie === "") {
        var div = document.getElementsByClassName("cookies")[0];
        div.classList.remove("cookieHidden");
    }
}
