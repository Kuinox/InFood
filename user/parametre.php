<?php
include(__DIR__."/../controller/functions/fonction_modifier_compt.php");
include(__DIR__."/../controller/SQL/FUNCTIONS/connect.php");
if(isset($_POST['action'])) {
        $var = $_POST['action'];
    if($var == "password") {
        $aPwd = $_POST['aPassword'];
        $aPwd = hash("sha256",$aPwd);
        $prep = $bdd->prepare ("SELECT password FROM user WHERE email=? OR pseudo = ?");
        $prep->execute (array($_SESSION['user']['email'], $_SESSION['user']['pseudo']));
        $result = $prep->fetchAll(PDO::FETCH_ASSOC);
       if($aPwd == $result[0]['password'] ){
           $password = $_POST['password'];
           $cpwd = $_POST['cPassword'];
           if($password == $cpwd){
              $_SESSION['user']['password'] = hash("sha256",$password);
              updateUser($bdd);
              echo "mot de passe changé";
          }else {
              echo "champs non valide";
          }
        } else{
           echo "acien mot de passe non valide";
        }
    } else {
        if($var == 'email'){
            $mail = $_SESSION['user']['email'];
            $_SESSION['user']['email'] = $_POST['email'];
        } else if ($var == 'pseudo') {
            $pseudo = $_SESSION['user']['pseudo'];
            $_SESSION['user']['pseudo'] = $_POST['pseudo'];
        }
        $prep = $bdd->prepare ("SELECT id_user FROM user WHERE email=? OR pseudo = ?");
        $prep->execute (array($_SESSION['user']['email'], $_SESSION['user']['pseudo']));
        if ($prep->rowCount()>1) {
            if($var == 'email'){
            $_SESSION['user']['email'] = $mail;
            } else if ($var == 'pseudo') {
            $_SESSION['user']['pseudo'] = $pseudo;
            }
            echo "pseudo ou email deja utiliser";
        }else{
            $_SESSION['user'][$var] = $_POST[$var];
            updateUser($bdd);
            echo "L'information à bien été changée";
    }
    }

} else {

}
include(__DIR__."/modifierCompte.php");
?>
