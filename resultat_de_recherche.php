<?php
include ("controller/SQL/FUNCTIONS/connect.php");
include ('controller/SQL/FUNCTIONS/select.php');

$recherche = addslashes($_GET['recherche']);
var_dump ($recherche);
$type = addslashes($_GET['type']);
$_SESSION['type'] = $type; //TODO a quoi sa sert ???

var_dump($type);
$table = $type; //et ca aussi ? Pourquoi créer deux variable avec le meme contenu ???

$array = explode (" ",$recherche);
$output = [];
foreach ($array as $key => $value) {
  $output[] = "%".$value."%";
}

function displayRecherche(array $output) {
    foreach ($output as $key => $value) {
        $id = $value['id_aliment'];
        $name = $value['name_aliment'];
        echo "<a href= additive.php?id=$id&type=$type>$name</a><br>";
    }
}

function recherche(mysqli $bdd, array $input, string $type) {
    $recherche = implode("",$input);
    var_dump($input);
    var_dump($recherche);
    $like = "'".$recherche."'";
    switch ($type) {
        case 'aliment':
            $query = "SELECT g.label , a.name_aliment, a.id_aliment
                      FROM aliment a
                      LEFT OUTER JOIN generic_name g
                      ON g.id = a.generic_name_id
                      WHERE a.name_aliment LIKE $like;";
            $result = mysqli_query($bdd, $query);
            $output = mysqli_fetch_all($result, MYSQLI_ASSOC); ;
            break;
        case 'additive':
        case 'ingredient':
            $output = select ($bdd, $type, "label", $like);
            break;
    }
    displayRecherche($output)
}
recherche($bdd, $output, $type);
?>
