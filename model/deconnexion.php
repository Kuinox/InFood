<?php
include("controller/functions/deconnexion.php");
if(isset($_SESSION['nom'])) { ?>
    <form class="inline" action="" method="POST">
        <input type="hidden" name="action" value="deconnexion"/>
        <input type="submit" value="Se déconnecter"/>
    </form>
<?php  } ?>
