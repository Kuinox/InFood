<?php
function ajout_panier($_GET['id'])
{
	if(isset($_POST['go']))
	{
		if(!isset($_SESSION['panier']))
		{
			//créer panier si n'existe pas
			$_SESSION['panier']=[];
		}
		else
		{
			//**//
		}
		$panier=$_SESSION['panier'];
		$produit = $_GET['id'];
		$ses = $_POST['nombre_produit'];
		
		$_SESSION['panier'][$produit] =  $ses;
		if($_POST['nombre_produit']==0)
		{
			unset($_SESSION['panier'][$produit]);
		}
		//affichage 
		foreach($_SESSION['panier'] as $i =>$key) {
			$i >0;
			echo $i."=>".$key."<br>";	
		}

	}
}

?>