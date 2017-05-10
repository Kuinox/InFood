<?php 
// include("connect.php");
$bdd = new PDO('localhost','root','','infood');
$requete = $bdd->query("SELECT * FROM user");
while($data = $requete->fetch()){
echo'<h2>'.$data['pseudo'].'</h2><br>';
}
/*$reponce = mysql_query("SELECT * FROM user WHERE pseudo LIKE 'toto'");
while($donnees = mysql_fetch_array($reponse))
{
	echo $donnees['pseudo'] . '<br />';
}*/
?>
