<?php
// function ajout_panier($_GET['id'])
include("pa.html");
		echo"ici ";
	if(isset($_get['go']))
	{echo "go";
		if(!isset($_SESSION['panier']))
		{
			//créer panier si n'existe pas
			$_SESSION['panier']=[];
			echo"ici 1";
		}
		else
		{
			echo"ici2";

		}		echo"ici3";

		$panier=$_SESSION['panier'];
		$produit = $_GET['id'];
		$ses = $_GET['nombre_produit'];
		
		$_SESSION['panier'][$produit] =  $ses;
		if($_GET['nombre_produit']==0)
		{
			unset($_SESSION['panier'][$produit]);		echo"ici4";

		}
		//affichage 
		echo"ici";
		foreach($_SESSION['panier'] as $i =>$key) {
			$i >0;
			echo $i."=>".$key.include('supprimer.html')."<br>";	
		}

	}

?>