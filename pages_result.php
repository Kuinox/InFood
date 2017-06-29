<?php
// on prépare une requête permettant de calculer le nombre total d'éléments qu'il faudra afficher sur nos différentes pages
$sql  = 'SELECT count(*) FROM aliment';

// on exécute cette requête
$resultat = mysql_query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error());

// on récupère le nombre d'éléments à afficher
$nb_total = mysql_fetch_array($resultat);

// on teste si ce nombre de vaut pas 0
if (($nb_total = $nb_total[0]) == 0) {
	echo 'Aucune réponse trouvée';
}
else {
	echo '<table><tr><td><td>Description</td></tr>';

	// sinon, on regarde si la variable $debut (le x de notre LIMIT) n'a pas déjà été déclarée, et dans ce cas, on l'initialise à 0

	if (!isset($_GET['debut'])) {
	$_GET['debut'] = 0;
	}
	$nb_affichage_par_page = 10;

	// Préparation de la requête avec le LIMIT
	$sql = 'SELECT   FROM  ORDER BY  ASC LIMIT '.$_GET['debut'].','.$nb_affichage_par_page;

	// on exécute la requête
	$req = mysql_query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error());

	// on va scanner tous les tuples un par un
	while ($data = mysql_fetch_array($req)) {
		// on affiches les résultats dans la <table>
		echo '<tr><td><td>' , htmlentities(trim($data['description'])) , '</td></tr>';
	}

	// on libère l'espace mémoire alloué pour cette requête
	mysql_free_result ($req);
	echo '</table><br />';

	// on affiche enfin notre barre
	echo '[b]'.barre_navigation($nb_total, $nb_affichage_par_page, $_GET['debut'], 3).'[/b]';
}
// on libère l'espace mémoire alloué pour cette requête
mysql_free_result ($resultat);
// on ferme la connexion à la base de données.
mysql_close ();
echo '</table><br />';
?>
if (!isset($_GET['debut'])){
		$_GET['debut'] = 0;
}
$nb_affichage_par_page = 15;
// on calcul le numéro de la page active
$page_active = floor(($debut/$nb_affichage_par_page)+1);
// on calcul le nombre de pages total que va prendre notre affichage
$nb_pages_total = ceil($nb_total/$nb_affichage_par_page);
    $nb_total = count($output);
