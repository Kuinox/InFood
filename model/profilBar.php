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
        <?php include("backend_link.php") ?>
    </ul>
</div>

<?php
}
?>
