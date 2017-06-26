<?php
function getUserFilters(PDO $bdd, $user_id) {
    $query = "  SELECT *
                FROM `user` u
                JOIN `filter` f
                ON u.id_user = user_id_user
                WHERE u.id_user = ?" ;
    $prep = $bdd->prepare($query);
    $prep->execute(array($user_id));
    return $prep->fetchAll(PDO::FETCH_ASSOC)[0];
}

function getUserSearchFilter(PDO $bdd, $user_id) {
        $query = "  SELECT filter FROM `user` WHERE user_id = ?";
        $prep = $bdd->prepare($query);
        $prep->execute(array($user_id));
        return array_pop($prep->fetchAll(PDO::FETCH_ASSOC)[0]);
}

function updateGeneralSQL(PDO $bdd, $new_general_SQL, $user_id) {
    $query = "UPDATE `user` SET filter = ? WHERE id_user = ?";
    $prep = $bdd->prepare($query);
    $prep->execute(array($new_general_SQL, $user_id));
}

function addFilter(PDO $bdd, $user_id, $filter_json, $filter_SQL, $new_general_SQL, $color) {
    updateGeneralSQL($bdd, $new_general_SQL, $user_id);
    $query = "  INSERT INTO `filter`
                (user_id_user, filtre, json, color)
                VALUES(?,?,?,?)";
    $prep = $bdd->prepare($query);
    $prep->execute(array($user_id, $filter_SQL, $filter_json, $color));
    return $bdd->lastInsertId();
}
function modifyFilter(PDO $bdd, $user_id, $filter_json, $filter_SQL, $new_general_SQL, $color, $filter_id) {
    $query = "  UPDATE `filter` SET user_id_user = ?, filtre = ?, json = ?, color = ?
                WHERE id = ?";
    $prep = $bdd->prepare($query);
    $prep->execute(array($user_id, $filter_SQL, $filter_json, $color, $filter_id));
}

function removeFilter(PDO $bdd, $user_id, $filter_id, $new_general_SQL) {
    updateGeneralSQL($bdd, $new_general_SQL, $user_id);
    $query = "DELETE FROM `filtre` WHERE id = ?";
    $prep = $bdd->prepare($query);
    $prep->execute(array($filter_id));
}


?>
