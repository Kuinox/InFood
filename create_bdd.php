<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>INDEX</title>
		<link rel="stylesheet" href="styles.css">
        <script src="js/ajax.js"></script>
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
            <div id="progress-output">Not working</div>
            <progress id="progress" value="" max="100"></progress>



	</body>
</html>
