<?php
include("model/top.php");
include("model/functions/filtres.php");
include("controller/SQL/functions/connect.php");
addFilter($bdd, $_SESSION['user']['id_user'], "{\"name\":\"nouveau\"}", "SELECT * FROM `user`", "nope", "#555555");
displayAllFilters($bdd);
?>
<div class='filter-title hidden'>

</div>
<div class='dropdown hidden'>

</div>
<div class = 'color-picker normalHidden'>
    colorpicker
</div>
<div class = 'save normalHidden'>
    Sauvegarder
</div>
<?php
include("model/bot.php");
?>
