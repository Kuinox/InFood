<?php
session_start();
include("../SQL/FUNCTIONS/connect.php");//connexion au bdd
$pseudo = $_POST['pseudo'];
$email = $_POST['email'];
$query = "SELECT * FROM user WHERE pseudo like ?";
$prep = $bdd->prepare($query);
$prep->execute(array($pseudo)) or die ("Erreur BDD");
if ($prep->rowCount() > 0) {
    echo "pseudo_exist";
    exit();
}

$query = "SELECT * FROM user WHERE email like ?";
$prep = $bdd->prepare($query);
$prep->execute(array($email)) or die ("Erreur BDD");
if ($prep->rowCount() > 0) {
    echo "email_exist";
    exit();
}
$password = hash('sha256',$_POST["password"]);//hash mot de passe

$query = "INSERT INTO user (pseudo, email, password) values (?,?,?)";
$prep = $bdd->prepare($query);
$prep->execute(array($pseudo, $email, $password)) or die ("Erreur BDD");
$id = $bdd->lastInsertId();
$query = "INSERT INTO grade_user (user_id_user, grade_id_grade) values (?,?)";
$prep = $bdd->prepare($query);
$prep->execute(array($id, 1));
echo "sucess";

?>
