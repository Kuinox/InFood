<?php
function sqlScriptInject(PDO $bdd, $script_path) {
    $script_file = fopen($script_path, 'r');
    $script = "";
    if(!(strstr($script_path, "insert_") || strstr($script_path, "update_"))) {
        while ($line = fgets($script_file)) {
            $script[] = $line;
        }
        $lines = "";
        foreach($script as $query) {
            if (is_bool(strpos($query, '--')) && $query != "\n") {
                $lines .= $query;
            }
        }

        foreach(explode(";", $lines) as $query) {
            $query = trim(preg_replace('/\s+/', ' ', $query));
            if (!empty($query) && is_bool(strpos($query, "SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0")) && is_bool(strpos($query, "SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS"))) {
                try {
                    $bdd->query($query);
                } catch (PDOException $e) {
                    var_dump($e);
                    echo $query;
                }
            }
        }
    } else {//procedure
        while ($line = fgets($script_file)) {
            $script .= $line;
        }
        $precedent = '';
        $liste = [];
        foreach (explode("\n", $script) as $value) {
            if($value=="\r") {
                $liste[] = $precedent;
                $precedent = "";
            }
            $precedent.= $value;
        }
        $liste[] = $precedent;
        foreach ($liste as $query) {
            $bdd->query($query);
        }
    }
}
 ?>
