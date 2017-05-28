<?php
if(isset($_POST['go']))
{
	if(!isset($_SESSION['panier']))
	{
		$_SESSION['panier']=[];
	}
	else
	{
		// echo"session connue";
	}
	$panier=$_SESSION['panier'];
	$produit = "122555";
	$ses = $_POST['t'];

	// array_push($panier,$ses);
	$_SESSION['panier'][$produit] =  $ses;
	if($_POST['t']==0)
	{
		unset($_SESSION['panier'][$produit]);
	}
	foreach($_SESSION['panier'] as $i =>$key) {
	$i >0;
	echo $i."=>".$key."<br>";
	}

}
// session_destroy();
?>
	<form action='panier1.php' method='POST'>
		<input type='text' name='t'/>
		<input type='submit' value='sub' name='go'/>
	</form>
