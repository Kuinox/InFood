<?php

function displayPref(Preference $pref) {
    foreach($pref->getPref() as $line) {
        echo "<a href='../aliment?id=".$line['id_aliment']."'>".$line['name_aliment']."</a></br>
        <form action='' method='POST'>
            <input type='hidden' name='action' value='delPref'/>
            <input type='hidden' name='id' value='".$line['id_aliment']."'/>
            <input type='submit' value='suppr' />
        </form>";
    }
}
?>
