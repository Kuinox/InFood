<?php

function displayComments($com, $displayContext=false) {
    $path = "/".explode("/", $_SERVER['REQUEST_URI'])[1]."/";
    echo "<br>Commentaire :";
    echo "<table>";
    foreach ($com as $key => $value) {
        echo "<tr>";
        if($displayContext) {
            echo "<td>Aliment:</td><td><a href='../aliment.php?id=".$value['id_aliment']."'>".$value['name_aliment']."</a></td></tr><tr>";
        } else {
            echo "<td>pseudo : </td><td>";
            echo "<a href='user/?id=".$value['pseudo']."'>".$value['pseudo']."</a></td>";
        }
      echo "</td></tr><tr><td>";
      echo $value['text_comment'];
      echo '</td><td><form action = "" method="POST">
      <input type="hidden" name = "id_comment" value = "'.$value['id'].'">
      <input type="image" src="'.$path.'ressources/poubelle.png" alt="Submit">
      </form></td></tr>';
    }
        echo "</table>";
}
?>
