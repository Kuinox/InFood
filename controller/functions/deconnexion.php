<?php
if(isset($_POST['action']) && $_POST['action'] == 'deconnexion') {
    session_unset();
    session_destroy();
    header('Location: '.$_SERVER['REQUEST_URI']);
    die;
}
?>
