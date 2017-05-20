<?php
session_start();
include_once("controller/SQL/FUNCTIONS/connectNoUse.php");
if($db_exist) {
 ?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>INDEX</title>
		 <link rel="stylesheet" href="styles.css">
	</head>
	<body>
		<?php
		include("model/header.php"); ?>
		<h1>In'Food	</h1>
		<form action="inscription1.php" method="get">
      <input type="submit" name="inscription" value="Inscription"/>
		</form>
		<form action="connectionessai.php" method="get">
			<input type="hidden"/>
			<input type="submit" name="connexion" value="Se connecter"/>
		</form>
	</body>
</html>
<?php
} else {
	include("model/create_bdd.php");
} ?>
