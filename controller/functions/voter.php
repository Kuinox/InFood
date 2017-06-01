<?php
function voter(PDO $bdd) {
    $note = $_POST['vote'];
    if ($note <= 5) {
        $prep = $bdd->prepare("CALL update_note(?, ?, ?)");
        $prep->execute(array($_GET['id'], $note , $_SESSION['user']['id_user']));
    } else {
        echo "la note doit etre entre 0 et 5 ";
        echo "<br><a href = index>retour</a>";
    }
}

?>
