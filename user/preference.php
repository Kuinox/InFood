<?php

include ("../view/functions/displayPref.php");
include("../model/functions/filtres.php");
include("../controller/SQL/functions/connect.php");

if(isset($_POST["action"]) && $_POST["action"] == "addFilter") {
    addFilter($bdd, $_SESSION['user']['id_user'], "{\"name\": \"\", \"data\": []}", "", "", "#9ee04d");
}

if(isset($_POST["action"]) && $_POST["action"] == "renameFilter") {
    addFilter($bdd, $_SESSION['user']['id_user'], "{\"name\": \"\", \"data\": []}", "", "", "#9ee04d");
}
displayAllFilters($bdd);
?>
<div class='filter-title normalHidden'>
    <form action="" method='POST'>
        <input onchange='this.form.submit()' type='text' name='name' value=''/>
        <input type='hidden' name='action' value='renameFilter' />
    </form>
</div>
<div class='dropdown normalHidden'>

</div>
<div class='menu normalHidden'>
    <?php
    $propertiesName = ["Nom", "Nom génerique", "Allergène", "Marque", "Additif", "Catégorie", "Ingrédients", "Labels", "Packaging", "Traces", "Nutriment", "Lieu de fabrication"];
    $properties = ["aliment", "generic_name", "allergens", "brands", "additives", "categories", "ingredients", "labels", "packaging", "traces", "nutriment", "manufacturing_place"];
    echo "<table id='table-filter' class='table-menu'>
    <tr class='table-title'>";
    foreach($propertiesName as $key => $value) {
        echo "<td id ='".$properties[$key]."' onclick='tabClick(this);'>
        $value
        </td>";
    }
    echo "</tr></table>"
    ?>
</div>

<div class = 'search normalHidden'>
    <form onsubmit="searchOnFly(this); return false;">
        <input type='text' name = 'search' placeholder="Rechercher sur InFood" />
        <input type='submit' value='Go' />
    </form>
</div>
<div class ='search-results normalHidden'>

</div>
<div class = 'color-picker normalHidden'>
    colorpicker
</div>
<div class = 'save normalHidden'>
    Sauvegarder
</div>
<?php
displayPref($pref);
?>
