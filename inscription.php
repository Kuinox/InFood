<?php
include("connect.php");

$nom=$_COOKIE["nom"];
$eml=$_COOKIE["eml"];
$pwd=$_COOKIE["pwd"];
$weight=$_COOKIE["weight"];
$height=$_COOKIE["height"];

$mailchek=$eml;
$result = mysqli_query($bdd, "SELECT * FROM user WHERE email like '$mailchek'");
$row_cnt = mysqli_num_rows($result);
mysqli_free_result($result);

if($row_cnt!== 0) {
	echo"erreur mail deja utiliser <br>";
}
elseif($row_cnt== 0)
{
	$req="INSERT INTO user (pseudo, password, email, height, weight) values ('$nom','$pwd','$eml','$height','$weight')";
	$res=mysqli_query($bdd,$req);
	$html = include("inscriptionreussie.php");
	echo "$html";
}
?>
