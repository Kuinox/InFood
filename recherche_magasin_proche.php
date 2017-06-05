<?PHP
include("view/recherche_magasin_proche.php");
if(isset($_GET['recherche']))
{
	$q=$_GET['recherche'];
	echo $q;
	header("Location: https://www.google.fr/maps/search/market+$q");
}
?>
