<<<<<<< HEAD
Bonjour <?php  session_start();
 echo$_SESSION['pseudo'];?>
=======
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

$nom=$_SESSION['name'];
echo"<h1>bonjour $nom</h1>"
?>
>>>>>>> 4204bca629a989f61c630444a62fc780ef5ca141
<a href="./deconnexion.php">déconnection</a>