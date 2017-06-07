<?php
if(isset($_SESSION['user'])) { //TODO completer liens ?>

<div id="profilButton" class="profilButton" onclick="profilBar(this)">
    IMAGE !


    <div class="arrow arrow-up">
        <svg xmlns="http://www.w3.org/2000/svg" style="padding-bottom:1000%;" version="1.1" x="0" y="0" viewBox="0 0 256 128" enable-background="new 0 0 256 128" xml:space="preserve"><polygon points="0 0 128 128 256 0 " style="fill:#4e5d66"/></svg>
    </div>
</div>
<div id="profilContent" class="menuContent">
    <ul>
        <li> <a href="<?php echo "/".explode("/", $_SERVER['REQUEST_URI'])[1]."/"."user" ?>"><?php echo $_SESSION['user']['pseudo']; ?> </a></li>
        <li> <a> lien vers le panier</a></li>
        <li> <?php include("deconnexion.php"); ?> </li>
        <li> <a href="./recherche_magasin_proche.php" target="_blank"> Recherche Mg Proche </a></li>
        <li> <a href="./controller/supprimerMonCompte.php"> Supprimer Mon Compte</a></li>

<?php   if ($_SESSION['user']['name_grade'] == 'admin') {
            $path = "/".explode("/", $_SERVER['REQUEST_URI'])[1]."/";?>
            <li> <a href='<?php echo $path; ?>admin/'>Accès administrateur</a></li>
<?php   }?>
    </ul>
</div>
<?php
} ?>
