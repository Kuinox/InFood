<?php
if (empty($product['generic_name'])) {
    $product['generic_name'] = 'NULL';
}
$query = "CALL insert_aliment('".$product['code']."', '".$product['product_name']."', ";
$query .= $product['last_modified_t'].", ";
$query .= "'".$product['ingredients_text']."', '".$product['generic_name']."', ". $grade_id.", ";
$query .= "'".$product['quantity']."', ";
$query .= "'".$product['serving_size']."')";
 ?>
