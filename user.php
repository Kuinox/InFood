<?php
include("model/top.php");
include("controller/SQL/FUNCTIONS/select.php");
include("controller/SQL/FUNCTIONS/connect.php");
if(!isset($_GET['id']) && isset($_SESSION['user'])) {
    $_GET['id'] = $_SESSION['user']['pseudo'];
} //TODO: gerer le cas où il y a accès a la page mais pas connectée
var_dump($_SESSION['user']);
$proprio = isset($_SESSION['user']) && $_SESSION['user']['pseudo'] == $_GET['id'];
$query = "SELECT c.* FROM user u JOIN comments c ON u.id_user = c.user_id_user WHERE u.pseudo = ?";
$prep = $bdd->prepare($query);
$prep->execute(array($_GET['id'])) or die ("Erreur BDD");
$result = $prep->fetchAll(PDO::FETCH_ASSOC);

echo $_GET['id'];
var_dump($result);
?>
<div>
    <a href="?tab=activite">Activité</a>
    <?php
    if ($proprio) {
        ?>
        <a href="?tab=preference">Préference alimentaire</a>
        <a href="?tab=settings">Paramètres</a>
        <?php
    }
     ?>

</div>


<?php
include("model/bot.php");
?>
