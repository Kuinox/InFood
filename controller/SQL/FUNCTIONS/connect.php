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
