<?php
if(!isset($_SESSION['user']['pseudo']) || (isset($_POST['action']) && $_POST['action'] == 'deconnexion')) {
 ?>
<button onclick="openInscription()">Inscription</button>
<button onclick="openConnexion()">Connexion</button>
<div id="connexion" class="overlay">
    <a onclick="closeConnexion()" href="javascript:void(0);">x</a>
        <?php include("model/connexion.html"); ?>
</div>
<div id="inscription" class="overlay">
    <a onclick="closeInscription()" href="javascript:void(0);">x</a>
    <?php include("inscription1.php"); ?>
</div>
<?php } ?>
