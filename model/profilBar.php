<?php
if(isset($_SESSION['user'])) { //TODO completer liens
?>
<div tabindex="0" class="sub_menu">
    <ul class="sub_menu-content">
        <li> <?php echo $_SESSION['user']['pseudo']; ?></li>
        <li> <a> lien vers le panier</a></li>
        <li> <a> lien vers la page de profil</a> </li>
        <li> <a> lien vers la page préferences produit/alergie</a></li>
        <li> <?php include("deconnexion.php"); ?> </li>
        <li> <a href="./controller/supprimerMonCompte.php"> Supprimer Mon Compte</a></li>

        <?php
        if ($_SESSION['user']['name_grade'] == 'admin') {
            $path = "/".explode("/", $_SERVER['REQUEST_URI'])[1]."/";
            ?>
            <li> <a href='<?php echo $path; ?>admin/'>Accès administrateur</a></li>
            <?php
        }
        ?>
    </ul>
</div>

<?php
}
?>
