<?php
function voter(PDO $bdd ) {
    $note = $_POST['vote'];
    $id = $_GET['id'];
    $id_user = $_SESSION['user']['id_user'];
        $query2 = "SELECT * FROM notes WHERE aliment_id_aliment = ? AND user_id_user = ?";
        $prep2 = $bdd->prepare($query2);
        $prep2->execute(array($id, $id_user));
        $result = $prep2->fetchAll(PDO::FETCH_ASSOC);
        if (empty($result)) {
            $query = "INSERT INTO notes (aliment_id_aliment,note,user_id_user)
                VALUES (?, ?, ?);";
            $prep = $bdd->prepare($query);
            $prep->execute(array($id, $note, $id_user));
        }else{
            $prep3 = $bdd->prepare("CALL update_note(?, ?, ?)");
            $prep3->execute(array($id, $note , $id_user));
        }

}
?>
