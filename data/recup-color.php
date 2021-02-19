<?php
  $requete = "SELECT * FROM `color`";
  $prepare_color = $connexion->prepare($requete);
  $prepare_color->execute();
  $prepare_color = $prepare_color->fetch();
?>