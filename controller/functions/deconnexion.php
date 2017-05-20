<?php
if(isset($_POST['action']) && $_POST['action'] == 'deconnexion') {
    session_unset();
    session_destroy();
}
?>
