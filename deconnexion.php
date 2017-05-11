<?php
function deconnexion () {
  session_start();
  session_destroy();
    $informations = Array(/*Déconnexion*/
  				'Déconnexion',
  				'Vous êtes à présent déconnecté.');
  exit();
  return $informations;
  header('Location:/INFOOD/index.php');
}
deconnexion();
?>
