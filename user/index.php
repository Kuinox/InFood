<?php
ob_start();
include("../model/top.php");
include("../controller/SQL/FUNCTIONS/connect.php");
include("../model/functions/getUserComment.php");
include("../controller/SQL/FUNCTIONS/comments.php");
include("../view/functions/displayComments.php");
$path = "/".explode("/", $_SERVER['REQUEST_URI'])[1]."/";
if (!isset($_SESSION['user']) && !isset($_GET['id'])) {
    header("Location: $path");
    exit;
}
if (!isset($_GET['id'])) {
    $_GET['id'] = $_SESSION['user']['pseudo'];
}
echo $_GET['id'];
displayComments(getUserComment($bdd, $_GET['id']), true);
include("../model/bot.php");
ob_end_flush();
?>


<?php /*

if(!isset($_GET['id']) && isset($_SESSION['user'])) {
    $_GET['id'] = $_SESSION['user']['pseudo'];
} //TODO: gerer le cas où il y a accès a la page mais pas connectée
$proprio = isset($_SESSION['user']) && $_SESSION['user']['pseudo'] == $_GET['id'];
$query = "SELECT c.* FROM user u JOIN comments c ON u.id_user = c.user_id_user WHERE u.pseudo = ?";
$prep = $bdd->prepare($query);
$prep->execute(array($_GET['id'])) or die ("Erreur BDD");
$result = $prep->fetchAll(PDO::FETCH_ASSOC);

echo $_GET['id'];
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
include("model/bot.php");*/
?>
