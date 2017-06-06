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
    $id = $_SESSION['user']['pseudo'];
    $proprio = true;
} else {
    $id = $_GET['id'];
    $proprio = $_GET['id'] == $_SESSION['user']['pseudo'];
}
if (isset($_GET['tab']) && $_GET['tab'] == "preference") {
    $tab = "preference";
} else if (isset($_GET['tab']) && $_GET['tab'] == "settings"){
    $tab = "settings";
}
else {
    $tab = "activite";
}
?>
<div class="nav">
    <div class="tab_profil <?php if($tab === "activite") echo "active"; ?>">
        <a href="?tab=activite">Activité</a>
    </div>
     <?php
    if ($proprio) {
        ?>
        <div class="tab_profil <?php if($tab === "preference") echo "active"; ?>">
            <a href="?tab=preference">Préference alimentaire</a>
        </div>
        <div class="tab_profil <?php if($tab === "settings") echo "active"; ?>">
            <a href="?tab=settings">Paramètres</a>
        </div>
        <?php
    }
     ?>
</div> <?php
echo $id;
switch($tab) {
    case "activite":
        displayComments(getUserComment($bdd, $id), true);
        break;
    case "preference":
        include("TODO");
        break;
    case "settings":
        include("TODO");
        break;
    default:
        throw new ErrorException("Wrong tab");
}

include("../model/bot.php");
ob_end_flush();
?>
