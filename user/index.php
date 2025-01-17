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

if (!isset($_GET['id']) || empty($_GET['id'])) {
    $id = $_SESSION['user']['pseudo'];
    $proprio = true;
} else {
    $id = $_GET['id'];
    $proprio = $_GET['id'] == $_SESSION['user']['pseudo'];
}
if (isset($_GET['tab']) && $_GET['tab'] == "preference") {
    $tab = "preference";
} else if (isset($_GET['tab']) && $_GET['tab'] == "parametre"){
    $tab = "parametre";
}
else {
    $tab = "activite";
}

?>
<div class="tab_container">
    <div class="tab_profil <?php if($tab === "activite") echo "active"; ?>">
      <a href="?tab=activite&id=<?php echo $id; ?>"<?php if($tab === "activite")
      {
        echo"style='padding-left: 1em;'";}?>
        style="padding-left: 1em; text-decoration:none;color:#9ee04d;">Activité</a>
    </div>
     <?php
    if ($proprio) {
        ?> <!--
        <div class="tab_profil  if($tab === "preference") echo "active"; ">
            <a href="?tab=preference&id= echo $id; "
               if($tab === "preference"){
                echo"style='padding-left: 1em;'";}
                style="padding-left: 1em; text-decoration:none;color:#9ee04d;  ">Préférences alimentaires</a>
        </div> -->
<?php }
    if($proprio || (isset($_SESSION['user']) && isset($_SESSION['user']['grade']) && $_SESSION['user']['grade'] =="admin")) {
        ?>
        <div class="tab_profil <?php if($tab === "parametre") echo "active"; ?>">
            <a href="?tab=parametre&id=<?php echo $id; ?>"<?php if($tab === "parametre")
            {
              echo"style='padding-left: 1em;'";}?>
              style="padding-left: 1em;padding-right: 2em; text-decoration:none;color:#9ee04d;  ">Paramètres</a>
        </div>
        <?php

    }
     ?>
     </div>
     <div>
       <br><br>
        Rechercher un membre:
        <form  action="recherche_membres" method="GET">
            <input type="text" name="recherche" />
            <input type="hidden" name="type" value="membres" />
            <input type="submit" value="Rechercher" />
        </form>
     </div>
 <?php

include("$tab.php");
include("../model/bot.php");
ob_end_flush();
?>
