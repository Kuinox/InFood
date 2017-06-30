/*exported openConnexion, closeConnexion, openInscription, closeInscription */
"use strict";
function openConnexion() {
    document.getElementById("connexion").style.display = "inline";
    console.log(document.getElementsByClassName("compare")[0]);
    document.getElementsByClassName("compare")[0].style["z-index"] = -1;
}

function closeConnexion() {
    document.getElementById("connexion").style.display = "none";
    document.getElementsByClassName("compare")[0].style["z-index"] = 1;
}

function openInscription() {
    document.getElementById("inscription").style.display = "inline";
    document.getElementsByClassName("compare")[0].style["z-index"] = -1;
}

function closeInscription() {
    document.getElementById("inscription").style.display = "none";
    document.getElementsByClassName("compare")[0].style["z-index"] = 1;
}
