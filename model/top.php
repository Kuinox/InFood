<?php
include_once(__DIR__."/../controller/SQL/FUNCTIONS/connectNoUse.php");
if(!$db_exist) {
    include(__DIR__."/../admin/create_bdd.php");
    exit;
}
?>
<!DOCTYPE html>
<html>

    <?php
    include(__DIR__."/head.php"); ?>
    <body> <?php include(__DIR__."/header.php");?>
