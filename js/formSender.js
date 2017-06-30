/*exported sendFormConnexion, sendFormInscription */
"use strict";
window.formSender = {};
console.log(window.location.href);



function sendFormConnexion() {
    if(checkConnectEntry()) {
        return;
    }
    var xhr = new XMLHttpRequest(); //instancie l'objet xhr
    xhr.onreadystatechange = function() {//Call a function when the state changes.
        var span_error = document.getElementById("erreur_message");
        if(xhr.readyState === 4 && xhr.status === 200) {
            console.log(xhr.responseText);
            switch (xhr.responseText) {
                case "sucess":
                    console.log("Inscription réussie");
                    window.location.reload();
                    break;
                case "wrong":
                    span_error.innerHTML = "Le pseudo/e-mail ne correspond pas au mot de passe";
                    console.log("Le pseudo/e-mail ne correspond pas au mot de passe");
                    break;
                case "Erreur BDD":
                    console.log("Erreur base de donnée");
                    span_error.innerHTML = "Erreur de base de donnée, veuillez contacter l'Administrateur du site.";
                    break;
                default:
                    if(xhr.responseText !== "") {
                        span_error.innerHTML = "Erreur Serveur, veuillez contacter l'Administrateur du site.";
                        console.log("Erreur serveur");
                    }
                    break;
            }
        } else if (xhr.status !== 200){
            console.log("Communication Error"+xhr.status);
        }
    };
    var url = window.location.href;
    var dir_name =  url.split("/")[0]+"//"+url.split("/")[2]+"/"+url.split("/")[3];
    xhr.open("POST", dir_name+"/controller/ajax/userConnect.php"); //ouvre la connexion
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    var login = encodeURIComponent(document.getElementById("login").value);
    var password = encodeURIComponent(document.getElementById("password").value);
    var post = "login="+login+"&password="+password;
    console.log(post);
    xhr.send(post);//envoie
    return false;
}

function checkPassword() {
    var password = encodeURIComponent(document.getElementById("password_inscription").value);
    var password_confirm = encodeURIComponent(document.getElementById("password_confirm").value);
    if (password !== password_confirm) {
        var span_error = document.getElementById("erreur_message_inscription");
        span_error.innerHTML = "Les mots de passe ne correspondent pas";
        console.log(password);
        console.log(password_confirm);

        return false;
    }
    return true;
}
function checkConnectEntry() {
    var c = encodeURIComponent(document.getElementById("login").value) !== "";
    var d = encodeURIComponent(document.getElementById("password").value) !== "";
    if (c&&d) {
        return true;
    }
    var span_error = document.getElementById("erreur_message_inscription");
    span_error.innerHTML = "Veuillez remplir tous les champs.";
    return false;
}

function checkEntry() {
    var a = encodeURIComponent(document.getElementById("password_inscription").value) !== "";
    var b = encodeURIComponent(document.getElementById("password_confirm").value) !== "";
    var email = encodeURIComponent(document.getElementById("email").value);
    var c = email !== "";
    var d = encodeURIComponent(document.getElementById("pseudo").value) !== "";
    var span_error = document.getElementById("erreur_message_inscription");
    if (email.indexOf("%40") === -1) {
        span_error.innerHTML = "Veuillez entrer un email correct.";
        return false;
    }
    if (a&&b&&c&&d) {
        return true;
    }


    span_error.innerHTML = "Veuillez remplir tous les champs.";
    return false;
}
function sendFormInscription() {
    if(!checkPassword() || !checkEntry()) {
        return;
    }
    var xhr = new XMLHttpRequest(); //instancie l'objet xhr
    xhr.onreadystatechange = function() {//Call a function when the state changes.
        var span_error = document.getElementById("erreur_message_inscription");
        if(xhr.readyState === 4 && xhr.status === 200) {
            console.log(xhr.responseText);
            switch (xhr.responseText) {
                case "sucess":
                    console.log("SUCESS");
                    window.location.href = "inscriptionreussie.php";
                    break;
                case "email_exist":
                    console.log("Un compte existe déjà avec cette e-mail");
                    span_error.innerHTML = "Un compte existe déjà avec cette e-mail";
                    break;
                case "pseudo_exist":
                    span_error.innerHTML = "Un compte existe déjà avec ce pseudo";
                    console.log("Un compte existe déjà avec ce pseudo");
                    break;
                case "Erreur BDD":
                    console.log("Erreur base de donnée");
                    span_error.innerHTML = "Erreur de base de donnée, veuillez contacter l'Administrateur du site.";
                    break;
                default:
                    if(xhr.responseText !== "") {
                        span_error.innerHTML = "Erreur Serveur, veuillez contacter l'Administrateur du site.";
                        console.log("Erreur serveur");
                    }
                    break;
            }
        } else if (xhr.status !== 200){
            console.log("Communication Error"+xhr.status);
        }
    };
    var span_error;
    var pseudo      = encodeURIComponent(document.getElementById("pseudo"               ).value);
    var password    = encodeURIComponent(document.getElementById("password_inscription" ).value);
    var email       = encodeURIComponent(document.getElementById("email"                ).value);
    var url = window.location.href;
    var dir_name =  url.split("/")[0]+"//"+url.split("/")[2]+"/"+url.split("/")[3];
    xhr.open("POST", dir_name+"/controller/ajax/userInscription.php"); //ouvre la connexion
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    var post = "pseudo="+pseudo+"&password="+password+"&email="+email;
    console.log(post);
    xhr.send(post);//envoie

}
