<?php
include(__DIR__."/../controller/SQL/FUNCTIONS/connect.php");//connexion au bdd
if (isset($_SESSION['user'])) {
$id=$_SESSION['user']['id_user'];
if(isset($id) AND $id > 0) {
   $getid = intval($id);
   $requser = $bdd->prepare('SELECT * FROM user WHERE id_user = ?');
   $requser->execute(array($getid));
   $userinfo = $requser->fetch();
   //var_dump($userinfo);
   }

$path = "/".explode("/", $_SERVER['REQUEST_URI'])[1]."/";

if(isset($_SESSION['user'])) { //TODO completer liens ?>

<div id="profilButton" class="profilButton" onclick="profilBar(this)">

   <?php
   if(($userinfo['avatar'])== null){
     ?><br><img src="<?php echo $path;?>/../ii.png "style="height:200%; weight:300%;"/><br>
     <?php
   }
   else
   {?>
     <img src="<?php echo $path;?>avatar/<?php echo $userinfo['avatar'];?>" style="height:200%; weight:300%;"/>
     <?php
   } ?>
    <div class="arrow arrow-up">
        <svg xmlns="http://www.w3.org/2000/svg" style="padding-bottom:1000%;" version="1.1" x="0" y="0" viewBox="0 0 256 128" enable-background="new 0 0 256 128" xml:space="preserve"><polygon points="0 0 128 128 256 0 " style="fill:#4e5d66"/></svg>
    </div>
</div>
<div id="profilContent" class="menuContent">
    <ul>
        <li> <a href="<?php echo "/".explode("/", $_SERVER['REQUEST_URI'])[1]."/"."user" ?>"><?php echo $_SESSION['user']['pseudo']; ?> </a></li>
        <li> <?php include("deconnexion.php");
        $path = "/".explode("/", $_SERVER['REQUEST_URI'])[1]."/";
        ?> </li>
        <li> <a href="<?php echo $path; ?>recherche_magasin_proche.php" target="_blank"> Recherche de magasin Proche </a></li>

<?php   if ($_SESSION['user']['name_grade'] == 'admin') {?>
            <li> <a href='<?php echo $path; ?>admin/'>Accès administrateur</a></li>
<?php   }?>
    </ul>
</div>
<?php
} }?>
