<?php
function callThenReturn($bdd, $query) {
    if (empty($query)) {
        throw new Error('Query is empty in callThenReturn');
    }
    mysqli_query($bdd, $query) or die('Error in mysql procedure call '.$query.var_dump($bdd));
    $result = mysqli_query($bdd, 'SELECT @output');
    $output = mysqli_fetch_all($result);
    if (count($output) != 1) {
        throw new Error('Multiple output on callThenReturn '.$query);
    }
    return reset($output[0]);
}
 ?>
