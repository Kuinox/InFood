/*exported openConnexion, closeConnexion, openInscription, closeInscription */
"use strict";
function openConnexion() {
    document.getElementById("connexion").style.display = "inline";
    console.log(document.getElementsByClassName("compare")[0]);
    try {
        document.getElementsByClassName("compare")[0].style["z-index"] = -1;
    } catch (e) {

    }
}

function closeConnexion() {
    document.getElementById("connexion").style.display = "none";
    try {
        document.getElementsByClassName("compare")[0].style["z-index"] = 1;
    } catch (e) {

    }
}

function openInscription() {
    document.getElementById("inscription").style.display = "inline";
    try {
        document.getElementsByClassName("compare")[0].style["z-index"] = -1;
    } catch (e) {

    }

}

function closeInscription() {
    document.getElementById("inscription").style.display = "none";
    try {
        document.getElementsByClassName("compare")[0].style["z-index"] = 1;
    } catch (e) {

    }

}
