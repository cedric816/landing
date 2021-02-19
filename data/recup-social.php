<?php
  $requete = "SELECT * FROM `social`";
  $prepare_social = $connexion->prepare($requete);
  $prepare_social->execute();
?>