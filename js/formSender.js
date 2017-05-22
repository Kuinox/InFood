/*exported sendFormConnexion */
"use strict";
window.formSender = {};



function sendFormConnexion() {
    var xhr = new XMLHttpRequest(); //instancie l'objet xhr
    xhr.open("POST", "controller/functions/userConnect.php"); //ouvre la connexion
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    var login = encodeURIComponent(document.getElementById("login").value);
    var password = encodeURIComponent(document.getElementById("password").value);
    xhr.onreadystatechange = function() {//Call a function when the state changes.
        if(xhr.readyState === 4 && xhr.status === 200) {
            console.log(xhr.responseText);
            if(xhr.responseText === "sucess") {
                console.log("connection réussie");
            } else if (xhr.responseText === "wrong"){
                console.log("Le pseudo/e-mail ne correspond pas au mot de passe");
            } else if (xhr.responseText === "Erreur BDD"){
                console.log("Erreur base de donnée");
            } else if(xhr.responseText !== "") {
                console.log("Erreur serveur");
            }
        } else if (xhr.status !== 200){
            console.log("Communication Error"+xhr.status);
        }
    };
    var post = "login="+login+"&password="+password;
    console.log(post);
    xhr.send(post);//envoie
    return false;
 }

 // get the current progress
