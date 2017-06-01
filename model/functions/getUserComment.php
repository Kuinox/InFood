<?php
function getUserComment(PDO $bdd, $username) {
    $query = "  SELECT c.*, a.*, u.pseudo
                FROM user u
                JOIN comments c
                ON u.id_user = c.user_id_user
                JOIN aliment a
                ON a.id_aliment = c.aliment_id_aliment
                WHERE u.pseudo = ?";
    $prep = $bdd->prepare($query);
    $prep->execute(array($username));

    $comments = $prep->fetchAll(PDO::FETCH_ASSOC);
    return $comments;
}
?>
