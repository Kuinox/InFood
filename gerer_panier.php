<?php
/* cree panier*/
session_start();
$prod=$_SESSION['prod'];
$panier=$_SESSION['panier'];
array_push($panier,$prod);
// print_r($panier);
$_SESSION['panier']=$panier;
foreach($panier as $i =>$key) {
$i >0;
	echo $key."<br>";
}
?>
<a href='./'>accueil</a>
<a href='./deconnexion.php'>deconnexion</a>
