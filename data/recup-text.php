<?php
  $requete = "SELECT * FROM `text`";
  $prepare_text = $connexion->prepare($requete);
  $prepare_text->execute();
  $prepare_text = $prepare_text->fetch();
?>