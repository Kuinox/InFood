<?php
$conn=mysqli_connect('localhost','root','','inscription')or die(mysqli_error());
$nom=$_COOKIE["nom"];
$pre=$_COOKIE["pre"];
$eml=$_COOKIE["eml"];
$pwd=$_COOKIE["pwd"];
/*$nom=$_POST['nom'];
$pre=$_POST['pre'];
$eml=$_POST['eml'];
$pwd=$_POST['pwd'];
$userchek=$eml;
$userchek="SELECT * FROM users WHERE 'email'=$userchek";
$res=mysqli_query($conn,$userchek);
$yes=count($res);
echo $yes;
if($yes>0)
{ 
	// header('Location:/INFOOD/inscription1.php');
	echo"erreur mail existe";
}else{
 // $username = mysqli_real_escape_string($conn,$_POST['nom']);

  // $result = mysqli_query($conn, "SELECT * FROM users WHERE nom='".$username."' AND activate='0'");

  // if ($result->num_rows){
// echo "you are activated !!";
 // }

   // else
  // {
	  // echo "you are not activated !!";

  // do what u like here if not activated
    // }
		
	*/
	$req="INSERT INTO users (nom, prenom, email, password) values ('$nom','$pre','$eml','$pwd')";
	$res=mysqli_query($conn,$req);
	

?>
<body>
	<p>Bienvenue <?php echo($nom)?> votre compte à étés bien enregitrer</p>
	<table>
		<tr>
			<td>Nom :</td>
			<td><?php echo($nom)?></td>
		</tr>
		<tr>
			<td>prenom :</td>
			<td><?php echo($pre)?></td>
		</tr>
		<tr>
			<td>Email :</td>
			<td><?php echo($eml)?></td>
		</tr>
	</table>
	<p><a href="index.php">Retour à la page d'accueil </a></p>
</body>
