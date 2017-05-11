<?php 
<<<<<<< HEAD
// include("controller/SQL/FUNCTIONS/connect.php");
$bdd = new PDO('localhost','root','','infood');
$requete = $bdd->query("SELECT * FROM user");
=======
// include("connect.php");
 /*session_start();
$email =$_SESSION['email'];
$bdd = new PDO('mysql:dbname=infood;host=localhost','root','');
$requete = $bdd->query("SELECT  pseudo  FROM user WHERE email like 's@s'");
>>>>>>> a64cdff... inscription
while($data = $requete->fetch()){
echo'<h2>'.$data['pseudo'].'</h2><br>';
		$_SESSION['name']=$data['pseudo']};*/
		*session_start();
$email =$_SESSION['email'];
$bdd = new PDO('mysql:dbname=infood;host=localhost','root','');
$requete = $bdd->query("SELECT  pseudo  FROM user WHERE email like 's@s'");
var_dump($requete);
while($data = $requete->fetch()){
echo'<h2>'.$data['pseudo'].'</h2><br>';
		$_SESSION['name']=$data['pseudo'];
		

}
/*$reponce = mysql_query("SELECT * FROM user WHERE pseudo LIKE 'toto'");
while($donnees = mysql_fetch_array($reponse))
{
	echo $donnees['pseudo'] . '<br />';
}*/
?>
