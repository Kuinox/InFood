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
        include ("controller/SQL/FUNCTIONS/infoAliment.php");
        include ("view/function/displayTable.php");
        //include ('sql_functions.php');
      $result = select ($bdd, "aliment", "id_aliment",$_GET['id']);
      $id_aliment = $result[0]['id_aliment'];
      $nutri = nutriments($bdd, $id_aliment);
      $additives = additives($bdd, $id_aliment);
      
      displayAdditives($additives);
      displayNutri($nutri);

      displayComents();
        ?>
	</body>
</html>
<?php
} else {
	include("model/create_bdd.php");
} ?>
