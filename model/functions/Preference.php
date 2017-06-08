<?php
class Preference {
    var $_bdd;
    var $_pref;
    var $_enable;
    function __construct(PDO $bdd) {
        if(!isset($_SESSION['user'])) {
            $this->_enable = false;
        } else {
            $this->_enable = true;
        }
        $this->_bdd = $bdd;
        $this->_pref = $this->getPref();
    }

    function getEnable() {
        return $this->_enable;
    }
    function getPref() {
        $query="    SELECT a.*
                    FROM user u
                    JOIN unwanted_aliment uw
                    ON u.id_user = uw.user_id_user
                    JOIN aliment a
                    ON uw.aliment_id_aliment = a.id_aliment
                    WHERE id_user = ?";
        $prep = $this->_bdd->prepare($query);
        $prep->execute(array($_SESSION['user']['id_user']));
        return $prep->fetchAll(PDO::FETCH_ASSOC);
    }

    function isPrefAdded($id) {
        foreach ($this->getPref() as $values) {
            if($id === $values['id_aliment']) {
                return true;
            }
        }
        return false;
    }
    function addPref($id_aliment) {
        $query="INSERT INTO `unwanted_aliment` (`id`, `aliment_id_aliment`, `user_id_user`) VALUES (NULL, ?, ?)";
        $prep = $this->_bdd->prepare($query);
        $prep->execute(array($id_aliment, $_SESSION['user']['id_user']));
    }

    function delPref($id_aliment) {
        $query="DELETE FROM unwanted_aliment WHERE aliment_id_aliment = ? AND user_id_user = ?";
        $prep = $this->_bdd->prepare($query);
        $prep->execute(array($id_aliment, $_SESSION['user']['id_user']));
    }
}
?>
