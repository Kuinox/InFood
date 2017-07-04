<?php
include(__DIR__."/../controller/SQL/FUNCTIONS/connect.php");//connexion au bdd
session_start();
$id=$_SESSION['user']['id_user'];
if(isset($id) AND $id > 0) {
   $getid = intval($id);
   $requser = $bdd->prepare('SELECT * FROM user WHERE id_user = ?');
   $requser->execute(array($getid));
   $userinfo = $requser->fetch();
}
?>
<?php
if (!empty($userinfo['avatar']))
{
  ?>
  <br><img src="../avatar/<?php echo $userinfo['avatar'];?>" width="150"/><br>
  <?php
}
 ?>
