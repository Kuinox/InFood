<?php
function deconnexion () {
  session_start();
  vider_cookie();
  session_destroy();
    $informations = Array(/*Déconnexion*/
  				'Déconnexion',
  				'Vous êtes à présent déconnecté.');
  exit();
  return $informations;
}
?>
