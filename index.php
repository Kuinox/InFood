<?php
include("model/top.php");
include("model/functions/filtres.php");
include("controller/SQL/functions/connect.php");
addFilter($bdd, $_SESSION['user']['id_user'], "{'nom':'okaylenommarche'}", "SELECT * FROM `user`", "nope", "#FF00FF");
displayAllFilters($bdd);
include("model/bot.php");
?>
