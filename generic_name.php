<?php

?>


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

        $id = mysqli_escape_string($bdd, $_GET['id']);
        echo "<pre>";
        $result = mysqli_query($bdd, "SELECT label FROM generic_name WHERE id=$id");
        print_r (mysqli_fetch_assoc($result));
        echo "</pre>";
        displayComents(); ?>
	</body>
</html>
<?php
} else {
	include("model/create_bdd.php");
} ?>
