w<?php
if(!isset($_SESSION['nom']) || (isset($_POST['action']) && $_POST['action'] == 'deconnection')) {
 ?>
<a class="inline" href="connectionessai.php"><button>Inscription</button></a>
<a class="inline" href="connectionessai.php?connexion=Se+connecter"><button>Connexion</button></a>
<?php } ?>
