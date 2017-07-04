<?php include("top.php"); ?>
<form method="POST" action="" enctype="multipart/form-data">
<label>Avatar :</label>
<input type="file" name="avatar"/><br><br>
<input type="submit" value="Changer" />
</form>
<?PHP
$path = "/".explode("/", $_SERVER['REQUEST_URI'])[1]."/";

include(__DIR__."/../controller/SQL/FUNCTIONS/connect.php");//connexion au bdd
if(isset($_FILES['avatar'])AND !empty($_FILES['avatar']['name']))
{
   $tailleMax = 2097152;//2megaocte
   $extensionsValides =array('jpeg', 'jpg', 'gif', 'png');
   if($_FILES['avatar']['size'] <= $tailleMax)
   {
     $extensionUpload = strtolower(substr(strrchr($_FILES['avatar']['name'],'.'), 1));
     if(in_array($extensionUpload,$extensionsValides))
     {
       $chemin = "../avatar/".$_SESSION['user']['id_user'].".".$extensionUpload;
       $resultat = move_uploaded_file($_FILES['avatar']['tmp_name'], $chemin);
       if($resultat){
         $updateavatar = $bdd ->prepare('UPDATE user SET avatar = :avatar WHERE id_user = :id');
         $updateavatar->execute(array(
           'avatar' => $_SESSION['user']['id_user']."."."$extensionUpload",
           'id'=> $_SESSION['user']['id_user']
         ));
         //header('Location:profil.php?id='.$_SESSION['id']);
         header('Location:avatar.php');
         //echo "photo changer";
       }
       else{
         $msg="erreur in upload";
       }
     }
     else
     {
       echo"Votre photo de profil doit être jpg ou jpeg";
     }
   }
   else {
     $msg="Votre photo de profil ne doit pas passer 2 MO";
   }
}
?>
