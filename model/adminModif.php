<?php
include("../view/adminModifvue1.php");
include("../controller/SQL/FUNCTIONS/connect.php");//connexion au bdd
//session_start();
if(isset($_POST['cher'])){
$login = $_POST['name'] ;//protège les chars pour l'utiliser  dans une requête SQL
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
              WHERE u.pseudo= ?";
$prep = $bdd->prepare($query);

$prep->execute(array($login)) or die ("Erreur BDD");

if($prep->rowCount()>0) {//s'il existe mot de passe et email -> connexion réussi
    $data = $prep->fetch(PDO::FETCH_ASSOC); //Récupère la ligne suivante d'un jeu de résultats PDO
    $_SESSION['user2']= $data;
    var_dump($_SESSION['user2']);

    echo "le nom est existe!!";
    include("../view/adminModifvue2.php");
    echo "sucess";

} else { //si le mot de passe et email n'existe pas -> connexion échoué
    echo "le nom n'existe pas"; //affiche alerte
}
}
?>
