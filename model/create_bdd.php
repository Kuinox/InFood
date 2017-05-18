<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>INDEX</title>
		<link rel="stylesheet" href="styles.css">
        <script>
            'use strict';
            window.Nixo = {};
            function work()
            {
                // make ajax call
                var xhr = new XMLHttpRequest(); //instancie l'objet xhr
                xhr.open('GET', 'controller/functions/work.php'); //ouvre la connection
                xhr.send();//envoie
                Nixo.timerId = setInterval(function(){
                    console.log(xhr.response);
                     // get last response line
                     var progress = xhr.response.split('\n').pop();
                     // if last line does not start with //, set progress
                     if(progress.length < 2 || progress.substr(0, 2) != '//')
                         document.getElementById('progress').value = progress;
                     // stop handling response when request is finished
                     if(xhr.readyState == XMLHttpRequest.DONE)
                     {
                         clearInterval(Nixo.timerId);
                         Nixo.timerId = null;
                     }
                 }, 100, 100);
             }
             // get the current progress
         </script>
	</head>
	<body>
        <?php
            include_once("controller/SQL/FUNCTIONS/connectNoUse.php");
            if(!$db_exist) {
                echo "<h1> Base de donnée non existante. </h1>";
            } ?>
            <p>
            Créer la base de donnée. Le site sera disponible immédiatement après l'initialisation.
            Re-créer la base entièrement prend environ 1 heures, mais les informations seront disponible au fur et a mesure.
            </p>

            <input type="button" onclick="work()" value="Work"/>
            <a href="work.php">work.php (link)</a>
            <div id="progress-output">Not working</div>
            <progress id="progress" value="" max="100"></progress>
         ?>



	</body>
</html>
<?php
} else {
	include("model/create_bdd.php");
} ?>
