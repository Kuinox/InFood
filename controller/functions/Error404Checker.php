<?php
function Error404Checker($url) {
    $handle = curl_init($url);
    curl_setopt($handle,  CURLOPT_RETURNTRANSFER, TRUE);
    /* Get the HTML or whatever is linked in $url. */
    $response = curl_exec($handle);
    /* Check for 404 (file not found). */
    $httpCode = curl_getinfo($handle, CURLINFO_HTTP_CODE);
    curl_close($handle);
    if($httpCode == 404) {
        return true;
    }
    return false;
}
 ?>
