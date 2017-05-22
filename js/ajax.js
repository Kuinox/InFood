/*exported work */
"use strict";
window.window.ajax = {};
function work()
{
    // make ajax call
    var xhr = new XMLHttpRequest(); //instancie l'objet xhr
    xhr.open("GET", "controller/functions/create_bdd.php"); //ouvre la connexion
    xhr.send();//envoie
    window.ajax.timerId = setInterval(function(){
        console.log("reponse:");
        console.log(xhr.response);
         // get last response line
         var data = xhr.response.split("\n");
         data.pop();
         var progress = data.pop();
         if (progress === undefined) {
             progress = 0;
         }
             document.getElementById("progress").value = progress;
             console.log("data:");
             console.log(progress);
             var progressDiv = document.getElementById("progress-output");
             while(progressDiv.firstChild)
                 progressDiv.firstChild.remove();
            var progress_text;
            if (progress.length > 0) {
                progress_text = progress;
                console.log("num");
            } else {
                console.log("init");
                progress_text = "Initialising...";
            }
            progressDiv.appendChild(document.createTextNode(progress_text));
         // stop handling response when request is finished
         if(xhr.readyState === XMLHttpRequest.DONE)
         {
             clearInterval(window.ajax.timerId);
             window.ajax.timerId = null;
         }
     }, 100, 100);
 }
 // get the current progress