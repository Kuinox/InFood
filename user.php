
<?php 

 session_start();
$nom=$_SESSION['name'];
echo"<h1>bonjour $nom</h1>";
include("index.php");
?>
<a href="./deconnexion.php">déconnection</a>