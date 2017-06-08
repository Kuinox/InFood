<?php
include(__DIR__."/../controller/functions/fonction_modifier_compt.php");
include(__DIR__."/../controller/SQL/FUNCTIONS/connect.php");
include(__DIR__."/modifierCompte.php");
var_dump($_SESSION['user']);
if(isset($_POST['action'])) {
        $var = $_POST['action'];
    if($var == "password") {
            hash("sha256", $_SESSION['password']);
    } else {
        $prep = $bdd->prepare ("SELECT id_user FROM user WHERE email=? OR pseudo = ?");
        $prep->execute (array($_SESSION['user']['email'], $_SESSION['user']['pseudo']));
        if ($prep->rowCount()>=1) {
            echo "pseudo ou email deja utiliser";
        }else{
            $_SESSION['user'][$var] = $_POST[$var];
            updateUser($bdd);
        }
    }
    var_dump($_SESSION['user']);
} else {

}

?>
