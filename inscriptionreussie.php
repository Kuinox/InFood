<?php
$nom=$_COOKIE["nom"];
$eml=$_COOKIE["eml"];
echo"<body>
	<p>Bienvenue $nom votre compte à étés bien enregitrer</p>
	<table>
		<tr>
			<td>Nom :</td>
			<td>$nom</td>
		</tr>
		<tr>
			<td>Email :</td>
			<td>$eml</td>
		</tr>
	</table>
	<p><a href='index.php'>Retour à la page d accueil </a></p>
</body>"
;?>