<?php
include ('data/conf-bdd.php');
$color_font = $_POST['color'];
$color_back = $_POST['backColor'];

$requete ="UPDATE `color` SET `color_font` = :color_font, `color_back` = :color_back WHERE `color_id`= :id";
$prepare = $connexion->prepare($requete);
$prepare->execute(array(
  ':color_font' => $color_font,
  ':color_back' => $color_back,
  ':id' => 1
));

$res = $prepare->rowCount();
if ($res==1){
    echo("<p>couleurs modifiées</p>
    <form method='POST' action='admin.php'>
    <input type='hidden' name='login' value='admin'>
    <input type='hidden' name='mdp' value='oui'>
    <input class='grosButton ombre' type='submit' name='submit' value='retour admin'>
    ");
?>
    <button class="grosButton ombre"><a href='index.php'>Retour à la landing page</a></button>  
<?php
} else {
    echo("quelque chose n'a pas fonctionné...");
    }
?>
  