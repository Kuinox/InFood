<?php
session_start();
include("../SQL/FUNCTIONS/connect.php");//connexion au bdd
$login = $_POST['login'];//protège les chars pour l'utiliser  dans une requête SQL
$password=hash('sha256',$_POST["password"]);//hash mot de passe
$query = "    SELECT
            u.id_user,
            u.pseudo,
            u.password,
            u.email,
            u.height,
            u.weight,
            g.name_grade
            FROM
              USER u
            JOIN
              grade_user gu
            ON
              u.id_user = gu.user_id_user
            JOIN
              grade g
            ON
              gu.grade_id_grade = g.id_grade
              WHERE u.password = ? AND (u.email= ? OR u.pseudo= ?)";
$prep = $bdd->prepare($query);

$prep->execute(array($password, $login, $login)) or die ("Erreur BDD");

if($prep->rowCount()>0) {//s'il existe mot de passe et email -> connexion réussi
    $data = $prep->fetch(PDO::FETCH_ASSOC); //Récupère la ligne suivante d'un jeu de résultats PDO
    $_SESSION['user']= $data;
    $_SESSION['compare'] = [];
    echo "sucess";
} else { //si le mot de passe et email n'existe pas -> connexion échoué
    echo "wrong"; //affiche alerte
}

?>
