<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>INDEX</title>
	</head>
	<body>
		<h1>In'Food	</h1>
		<?
		//  todo passer en post
		?>
		<form action="inscription1.php" method="get">
			<input type="hidden"/>
			<input type="submit" name="inscription" value="Inscription"/>
		</form>
		<form action="connexionessai.php" method="get">
			<input type="hidden"/>
			<input type="submit" name="connexion" value="Se connecter"/>
		</form>
		<form action="resultat_de_recherche.php" method="GET" >
			<input type="text" name="recherche"/>
		<select name="filtre">
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
