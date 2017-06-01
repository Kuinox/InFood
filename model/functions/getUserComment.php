<?php
function getUserComment(PDO $bdd, $username) {
    $query = "  SELECT c.*
                FROM user u
                JOIN comments c
                ON u.id_user = c.user_id_user
                WHERE u.pseudo = ?";
    $prep = $bdd->prepare($query);
    $prep->execute(array($username));

    $comments = $prep->fetchAll(PDO::FETCH_ASSOC);
    return $comments;
}
?>
