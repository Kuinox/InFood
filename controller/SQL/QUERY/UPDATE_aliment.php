<?php
$query = "CALL update_aliment('".$product['code']."', '".$product['product_name']."', ";
$query .= $product['last_modified_t'].", ";
$query .= "'".$product['ingredients_text']."', ".$generic_id.", ". $grade_id.", ";
$query .= "'".$product['quantity']."', ";
$query .= "'".$product['serving_size']."', @output)";
 ?>
