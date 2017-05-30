/*exported work */
"use strict";
window.window.ajax = {};


function work(type)
{
    var button = document.getElementById("work_button");
    button.disabled = true;
    button.value = "En travail...";
    // make ajax call
    var xhr = new XMLHttpRequest(); //instancie l'objet xhr
    var url = window.location.href;
    var dir_name =  url.split("/")[0]+"//"+url.split("/")[2]+"/"+url.split("/")[3];
    xhr.open("GET", dir_name+"/controller/ajax/"+type+"_bdd.php"); //ouvre la connexion
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
