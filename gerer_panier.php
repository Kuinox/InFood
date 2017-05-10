<?php
/* cree panier*/
session_start();
$prod=$_SESSION['prod'];
$panier=$_SESSION['panier'];
array_push($panier,$prod);
print_r($panier);
?>
<a href='./'>accueil</a>