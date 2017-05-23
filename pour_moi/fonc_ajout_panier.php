<?php
function setPanier($id_produit, $quantite) {
	if(!isset($_SESSION['panier'])) {
		$_SESSION['panier'] = [];
	}
	$_SESSION['panier'][$id_produit] = $quantite;
	if($quantite==0){
		unset($_SESSION['panier'][$id_produit]);
	}

?>