<?PHP
include("view/recherche_magasin_proche.html");
if(isset($_GET['recherche']))
{
	$q=$_GET['t'];
	echo $q;	
	header("Location: https://www.google.fr/maps/search/market+$q");
}
?>