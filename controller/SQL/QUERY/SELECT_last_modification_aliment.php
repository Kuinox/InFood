<?php
$query = "  SELECT UNIX_TIMESTAMP(last_modification_aliment)
            FROM aliment
            WHERE id_aliment = '".$product['code']."'";
 ?>
