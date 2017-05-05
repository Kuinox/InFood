<?php
session_start();
// include ('deconnexion.php');
// deconnexion();

array_push($_SESSION['panier'],$_SESSION['id']=>$_SESSION['nameprod']);
var_dump ($_SESSION['panier']);

// $_SESSION['comp'] =$i;
?><br>
 <a href="./">acc<a>