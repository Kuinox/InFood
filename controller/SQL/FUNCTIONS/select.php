<?php
function select(PDO $bdd, $table, $where , $data){
    $query = "SELECT * FROM $table WHERE $where LIKE ?";
    $prep = $bdd->prepare($query);
    $prep->execute(array($data)) or die ("Erreur BDD");
    $result = $prep->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}
 ?>
