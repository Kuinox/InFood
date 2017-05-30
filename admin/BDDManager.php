<?php
ob_start();
include("../model/top.php");
if (!isset($_SESSION['user']) || $_SESSION['user']['name_grade'] != 'admin') {
    header("HTTP/1.1 403 Forbidden");
    echo "<h1>HTTP/1.1 403 Forbidden</h1>";
    exit;
}
?>
<h1>Page d'administration de la Base De Données.</h1>
<p><a href="create_bdd.php"> Page de re-création de la Base De Donnée </a></p>
<p><a href="update_bdd.php"> Page de mis à jour de la Base De Donnée </a></p>
<!--TODO-->
<?php
include("../model/bot.php");
ob_end_flush();
?>
