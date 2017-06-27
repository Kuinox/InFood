<?php
include("../functions/filtre.php");
include("../SQL/functions/connect.php");
if(!isset($_POST['id'])) {
    var_dump($_POST);
    exit("Id error");
}
echo json_encode(getFilterById($bdd, $_POST['id']));

?>
