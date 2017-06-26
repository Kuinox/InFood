<?php
include("model/top.php");
include("model/functions/filtres.php");
addFilter($bdd, $_SESSION['user']['id_user'], "{'nom':'okaylenommarche'}", "SELECT * FROM `user`", "nope", "#FF00FF");
include("model/bot.php");
?>
