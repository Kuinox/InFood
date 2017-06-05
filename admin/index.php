<?php
ob_start();
include("../model/top.php");
if (!isset($_SESSION['user']) || $_SESSION['user']['name_grade'] != 'admin') {
    header("HTTP/1.1 403 Forbidden");
    echo "<h1>HTTP/1.1 403 Forbidden</h1>";
    exit;
}
?>
<h1>Page d'administration.</h1>
<p><a href="BDDManager"> Gestion de la Base De Données. </a></p>
<p><a href="supprimerUtilisateur"> Supprimer Compte. </a></p>
<p><a> Gestion des comptes utilisateurs</a></p>

<!--TODO-->
<?php
include("../model/bot.php");
ob_end_flush();
?>
