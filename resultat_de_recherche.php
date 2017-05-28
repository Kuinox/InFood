<?php
include_once("controller/SQL/FUNCTIONS/connectNoUse.php");

if($db_exist) {
 ?>

<!DOCTYPE html>
<html>
    <?php include("model/head.php") ?>
	<body>
		<?php
        include("model/header.php");
        include("model/functions/displayRecherche.php");
        include("model/functions/recherche.php");
        include("controller/functions/rechercheToPattern.php");
        include("controller/SQL/FUNCTIONS/connect.php");
        displayRecherche(recherche($bdd, rechercheToPattern()));?>
	</body>
</html>
<?php
} else {
	include("model/create_bdd.php");
} ?>
