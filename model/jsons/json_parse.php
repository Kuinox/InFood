<?php
function parser($data, $namefield) {
    $ouput =  [];
    foreach($data as $value) {
        $ouput[$value[$namefield]] = $value;
    }
    return $ouput;
}
function dataAdditives () {
    $data = json_decode(file_get_contents(__DIR__."/additives.json"), true)['tags'];
    return parser($data, 'id');
}
function dataLabels() {
    $data = json_decode(file_get_contents(__DIR__."/../jsons/label.json"),true)['tags'];
    return parser($data, 'id');
}


?>
