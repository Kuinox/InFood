<?php
include_once("controller/SQL/FUNCTIONS/connectNoUse.php");

if($db_exist) {
 ?>

<!DOCTYPE html>
<html>
    <?php include("model/head.php") ?>
	<body>
		<?php
        include ('model/header.php');
        include ('controller/SQL/FUNCTIONS/connect.php');
        include ('controller/SQL/FUNCTIONS/select.php');
        $like = "'".addslashes($_GET['id'])."'";
        echo "<br>";
        $result = select ($bdd, 'additive', "id", $like);
        var_dump($result);
        ?>

	</body>
</html>
<?php
} else {
	include("model/create_bdd.php");
} ?>



<?php
//Display additive page

?>
<h1>Il faut rajouter le HTML sur cette page, c'est aussi pour cela que le logo est surdimensioné.
</h1>
