<?PHP
include("infood2/view/recherche_magasin_proche.html");

if(isset($_GET['recherche']))
{
	$q=$_GET['t'];
	echo $q;
	header("Location: https://www.google.fr/maps/search/market+$q");
	// echo"<a href='https://www.google.fr/maps/search/$q'>recherche</a>";
}
?>
