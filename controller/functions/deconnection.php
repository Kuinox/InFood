<?php
if(isset($_POST['action']) && $_POST['action'] == 'deconnection') {
    session_unset();
    session_destroy();
}
?>
