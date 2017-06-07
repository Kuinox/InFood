<?php
class Preference {
    var $_bdd;
    var $_pref;
    function __construct($bdd) {
        if(!isset($_SESSION['user'])) {
            throw new ErrorException("Preference can't be init if user is not connected");
        }
        $this->_bdd = $bdd;
        
    }

    function getPref() {
        $query="    SELECT *
                    FROM user u
                    JOIN unwanted_aliment uw
                    ON u.id_user = uw.user_id_user
                    JOIN aliment a
                    ON uw.aliment_id_aliment = a.id_aliment
                    WHERE id_user = ?";
        $prep = $this->_bdd->prepare($query);
        $prep->execute(array($_SESSION['user']['id_user']));
        $prep->fetchAll();
    }

    function addPref() {

    }

    function delPref() {

    }
}
?>
