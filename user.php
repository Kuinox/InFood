 <?php 
 session_start();
 // if(isset($_SESSION['id_user'])){
	// $userId =$_SESSION['id_user'];
	// $username=$_SESSION['pseudo'];
 // }else
 // {
	 // header('location:indexphp');
	 // die();
// }

$nom=$_SESSION['nom'];
echo"<h1>bonjour $nom</h1>"
?>
<a href="./deconnexion.php">déconnection</a>