<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>INDEX</title>
		 <link rel="stylesheet" href="styles.css">
	</head>
	<body>
		<?php include("view/header.html"); ?>
		<h1>In'Food	</h1>
		<form action="inscription1.php" method="get">
			<input type="hidden"/>
<a href="pourpouup.php"  onclick="open('connectionessai.php', 'Popup', 'scrollbars=1,resizable=1,height=560,width=770'); return false;" ><input type="submit" name="inscription" value="Inscription"/></a><br />
		</form>
		<form action="connectionessai.php" method="get">
			<input type="hidden"/>
			<input type="submit" name="connexion" value="Se connecter"/>
		</form>
		<form action="resultat_de_recherche.php" method="GET" >
			<input type="text" name="recherche"/>
		<select name="type">
		  <option value="aliment">Produit</option>
			<option value="additive">additif</option>
			<option value="ingredient">ingredient</option>
			<option value="categorie">categorie</option>
		</select>
		<input type="submit" name="sub" value="valide"/>
			<div></div>
		</form>
	</body>
</html>
