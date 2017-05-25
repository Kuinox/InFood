<?php
function select($bdd, $table, $where , $data){
    $query = "SELECT * FROM $table WHERE $where LIKE ?";
    $prep = $bdd->prepare($query);
    $prep->exec(array($data)) or die ("Erreur BDD");
    $result = $prep->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}
 ?>
