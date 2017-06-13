<?php
if(!isset($_SESSION['user']['pseudo']) || (isset($_POST['action']) && $_POST['action'] == 'deconnexion')) {
 ?>
<div id="inscri">
<button class= "inscription" onclick="openInscription()">Inscription</button>
<button class= "inscript" onclick="openConnexion()">Connexion</button>
<div>
<div id="connexion" class="overlay">
    <a onclick="closeConnexion()" href="javascript:void(0);">x</a>
        <?php include(__DIR__."/../view/connexion.html"); ?>
</div>
<div id="inscription" class="overlay">
    <a onclick="closeInscription()" href="javascript:void(0);">x</a>
    <?php include(__DIR__."/../view/inscription.html"); ?>
</div>
<?php } ?>
