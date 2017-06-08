<form action="adminModif" method="post">
<input type="text" name="name" placeholder="nom du personne pour modifier"/>
<input type="submit" name="cher" value="Changer"/>
</form>
<?php
session_start();
//include("..../SQL/FUNCTIONS/connect.php");//connexion au bdd
if(isset($_POST["cher"]))
{$login = $_POST['name'];//protège les chars pour l'utiliser  dans une requête SQL
$bdd=mysqli_connect("localhost","root","","infood");
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
              WHERE u.pseudo= ?)";
$prep = $bdd->prepare($query);

$prep->execute(array($login)) or die ("Erreur BDD");

if($prep->rowCount()>0) {//s'i nom existe
    $data = $prep->fetch(PDO::FETCH_ASSOC); //Récupère la ligne suivante d'un jeu de résultats PDO
    $_SESSION['userAd']= $data;
    echo "sucess";
} else { //si le mot de passe et email n'existe pas -> connexion échoué
    echo "wrong"; //affiche alerte
}
var_dump($_SESSION['userAd']);
}?>
