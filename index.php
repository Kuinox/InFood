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
		<h1>In'Food	</h1>
		<form action="inscription1.php" method="get">
      <input type="submit" name="inscription" value="Inscription"/>
		</form>
	</body>
</html>
<?php
} else {
	include("model/create_bdd.php");
} ?>
