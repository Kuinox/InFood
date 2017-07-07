<?php
session_start();
$double = false;
foreach ($_SESSION['compare'] as $key => $value) {
    if ($value == $_POST['id']) {
        $double = true;
    }
}
if ($double === false) {
    $_SESSION['compare'][] = $_POST['id'];

}else {
    echo "string";
}
header("location: ../../aliment?id=".$_POST['id']);
 ?>
