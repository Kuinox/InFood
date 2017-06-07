<?php
$data = json_decode(file_get_contents(__DIR__."/additives.json"), true)['tags'];
$data_additives =  [];
foreach($data as $value) {
    $data_additives[$value['id']] = $value;
}
?>
