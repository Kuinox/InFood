		<header>
			<div id="top_header">
				<form id="search" action="resultat_de_recherche.php" method="GET">
					In'Food
					<select name = "type" id="type">
						<option value="aliment" selected>Produits</option>
						<option value="additive">Additif</option>
						<option value="ingredient">Ingredient</option>
						<option value="categorie">Categorie</option>
						<option value="allergen">Allergène</option>
						<option value="manufacturing_place">Lieu de fabrication</option>
						<option value="brand">Marque</option>
						<option value="packaging">Packaging</option>
						<option value="generic_name">Nom générique</option>
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
