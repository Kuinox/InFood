<?php
include("controller/functions/voter.php");
if(isset($_POST['action'])) {
    if($_POST['action'] == 'voter'){
        voter($bdd);
    } else if ($_POST['action'] == 'commenter'){
        add_comments($bdd,$_POST['comment'],$_GET["id"],$_SESSION['user']['id_user']);
    }
}

?>
