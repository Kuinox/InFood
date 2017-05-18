<?php

  session_start();
  session_destroy();
    $informations = Array(/*Déconnexion*/
  				'Déconnexion',
  				'Vous êtes à présent déconnecté.');

header('Location:/INFOOD/index.php');
?>
