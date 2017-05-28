<?php
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
        $id = $_GET['id'];
        echo "<pre>";
        $prep = $bdd->prepare("SELECT label FROM generic_name WHERE id=?");
        $prep->execute(array($id));
        print_r ($prep->fetchAll(PDO::FETCH_ASSOC));
        echo "</pre>";
        displayComents(); ?>
	</body>
</html>
<?php
} else {
	include("model/create_bdd.php");
} ?>
