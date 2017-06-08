<?php
include (__DIR__."/../../model/functions/Preference.php");
$pref = new Preference($bdd);
if(isset($_POST['action']) && $_POST['action'] === "addPref") {
    $pref->addPref($_POST['id']);
} else if(isset($_POST['action']) && $_POST['action'] === "delPref") {
    $pref->delPref($_POST['id']);
}
?>
