<?php include("model/top.php") ?>
<?php $path = "/".explode("/", $_SERVER['REQUEST_URI'])[1]."/"; ?>
<form method="get" action="recherche_magasin_proche.php">
	<input type="text" name="recherche" placeholder="Votre emplacement"/>
	<input type="submit" value="recherche" name="submit"/>
</form>
<?php include("model/bot.php") ?>
