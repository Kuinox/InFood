<?php
function AjoutPanier(/*arg*/$id_produit)
{//verifier si exite
//si exite pas cree
//rajout produit (arg=id_produit)
	if(isset($_SESSION['panier']))
	{//isset (itha thokirat)
		//rempli
		$_SESSION['panier']=$panier;

	}else{//crer panier
		$_SESSION['panier'] = [];
	}
}
//
$id_produit=$_SESSION['id_produit'];
$panier=$_SESSION['panier'];
array_push($panier,id_produit);
// print_r($panier);
$_SESSION['panier']=$panier;
foreach($panier as $i =>$key) {
$i >0;
	echo $key."<br>";
}
?>
