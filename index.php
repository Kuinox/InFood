<?php
include_once("controller/SQL/FUNCTIONS/connectNoUse.php");

if($db_exist) {
?>

<!DOCTYPE html>
<html>
    <?php include("model/head.php") ?>
	<body>
		<?php
		include("model/header.php"); ?>
	</body>
</html>
<?php
} else {
	include("model/create_bdd.php");
} ?>
