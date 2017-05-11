<?php 
// include("connect.php");
 /*session_start();
$email =$_SESSION['email'];
$bdd = new PDO('mysql:dbname=infood;host=localhost','root','');
$requete = $bdd->query("SELECT  pseudo  FROM user WHERE email like 's@s'");
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
