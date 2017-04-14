<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<link rel="stylesheet" href="style.css"/>
		<title>INDEX</title>
	</head>
	<body>	
		<h1>In'Food	</h1>
		<button> inscription</button>
		<form action="connexion.php" method="get">
			<input type="hidden"/>
			<input type="submit" name="connexion" value="Se connecter"/>
			</form>		
		<form action="resultat_de_recherche.php" method="get">
			<input type="text" name="recherche"/>
			<input type="submit" name="recherche" value="recherche"/><br>
			Filtre option : 
			<select name="filtre" form="recherche">
			  <option value="produit">Produit</option>
			  <option value="qualite">qualite</option>
			  <option value=""></option>
			  <option value=""></option>
			</select>
			Filtre option : 
			<select name="filtre" form="recherche">
			  <option value="produit">Produit</option>
			  <option value="qualite">qualite</option>
			  <option value=""></option>
			  <option value=""></option>
			</select>
			<div></div>
		</form>		
	</body>
</html>