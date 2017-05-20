<?php
include("controller/functions/deconnection.php");
if(isset($_SESSION['nom'])) { ?>
    <form class="inline" action="" method="POST">
        <input type="hidden" name="action" value="deconnection"/>
        <input type="submit" value="Se déconnecter"/>
    </form>
<?php  } ?>
