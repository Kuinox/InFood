<?php
if ($_SESSION['user']['name_grade'] == 'admin') {
include_once("controller/SQL/FUNCTIONS/connectNoUse.php");
if($db_exist) {
?>
<!DOCTYPE html>
<html>
    <?php include("model/head.php") ?>
	<body> <?php include("model/header.php"); ?>
        Page d'administration.
        <!--TODO-->
	</body>
</html>
<?php
} else {
	include("model/create_bdd.php");
} ?>
<?php
} else {
    header("HTTP/1.1 401 Unauthorized");
    exit;
}
?>
