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
        include("controller/SQL/FUNCTIONS/connect.php");
        include("controller/SQL/FUNCTIONS/select.php");
        include ("controller/TEST.php");
        include ("controller/fonction_ajout_panier.php");
        //include ('sql_functions.php');

      echo "<pre>";
      print_r (select ($bdd, "aliment", "id_aliment",$_GET['id']));
      echo "</pre>";
      displayComents();
	  ajout_panier()
        ?>
	</body>
</html>
<?php
} else {
	include("model/create_bdd.php");
} ?>
