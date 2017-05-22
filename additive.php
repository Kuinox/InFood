<?php
//Display additive page
include ('model/header.php');
include ('controller/SQL/FUNCTIONS/connect.php');
include ('controller/SQL/FUNCTIONS/select.php');
$like = "'".addslashes($_GET['id'])."'";
echo "<br>";
$result = select ($bdd, 'additive', "id", $like);
var_dump($result);
?>
<h1>Il faut rajouter le HTML sur cette page, c'est aussi pour cela que le logo est surdimensioné.
</h1>
