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
        include("controller/SQL/FUNCTIONS/connect.php");
        include("controller/SQL/FUNCTIONS/select.php");
        include("controller/TEST.php");
        //include ('sql_functions.php');

        $id = mysqli_escape_string($bdd, $_GET['id']);
        echo "<pre>";
        print_r (select ($bdd, "categorie", "id_aliment", "'$id'"));
        echo "</pre>";
        displayComents(); ?>
	</body>
</html>
<?php
} else {
	include("model/create_bdd.php");
} ?>
