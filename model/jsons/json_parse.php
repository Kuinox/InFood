<?php
function parser($data, $namefield) {
    $ouput =  [];
    foreach($data as $value) {
        $ouput[$value[$namefield]] = $value;
    }
    return $ouput;
}
function dataJSON ($json_name) {
    $data = json_decode(file_get_contents(__DIR__."/$json_name.json"), true)['tags'];
    return parser($data, 'id');
}

?>
