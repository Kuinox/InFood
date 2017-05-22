<?php
session_start();
include_once("controller/SQL/FUNCTIONS/connectNoUse.php");

if($db_exist) {
 ?>

<!DOCTYPE html>
<html>
    <?php include("model/head.php") ?>
	<body>
		<?php
		include("model/header.php"); ?>
		<p>
            Inscription réussie !
        </p>
        <a href="index.php">Revenir à la page d'accueil</a>
	</body>
</html>
<?php
} else {
	include("model/create_bdd.php");
} ?>
