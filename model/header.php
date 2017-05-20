		<header>
			<div id="top_header">
				<form id="search" action="resultat_de_recherche.php" method="GET">
					In'Food
					<select name = "type" id="type">
						<option value="aliment" selected>Produits</option>
						<option value="additive">additif</option>
						<option value="ingredient">ingredient</option>
						<option value="categorie">categorie</option>
					</select>
					<input type="text" name="recherche" placeholder="Rechercher sur In'Food"/>
					<input id="logo_svg" type="image" src="ressources/logo.svg"/>
					<a href="todo"><img src="todo"/></a>
				</form>
				<?php
				include("connexionInscription.php");
				include("deconnexion.php"); ?>

			</div>
		</header>
