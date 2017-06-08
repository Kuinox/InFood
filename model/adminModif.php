<?php
$dsn = "mysql:dbname=infood; host=127.0.0.1; charset=utf8mb4";
$user = "root";
$password = "";
try {
    $bdd = new PDO($dsn, $user, $password);
} catch (PDOException $e) {
    echo 'Connexion échouée : ' . $e->getMessage();
}
$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>
<form action="adminModif.php" method="post">
<input type="text" name="name" placeholder="nom du personne"/>
<input type="submit" name="cher" value="Changer"/>
</form>
<?php
session_start();
//include("../SQL/FUNCTIONS/connect.php");//connexion au bdd
if(isset($_POST["cher"])){
$login = $_POST['name'];//protège les chars pour l'utiliser  dans une requête SQL
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
}
?>
