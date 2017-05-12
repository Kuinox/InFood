<?php 
session_start();
// $email =$_SESSION['email'];
$bdd = new PDO('mysql:dbname=infood;host=localhost','root','');
$requete = $bdd->query("SELECT  pseudo  FROM user WHERE email like 's@s'");
// var_dump($requete);
while($data = $requete->fetch())
{
echo'<h2>'.$data['pseudo'].'</h2><br>';
		$_SESSION['name']=$data['pseudo'];
}
?>
