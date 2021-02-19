<?php
include ('data/conf-bdd.php');
$social_id = $_POST['social_id'];

$requete ="DELETE FROM `social` 
            WHERE `social_id`= :social_id";
$prepare = $connexion->prepare($requete);
$prepare->execute(array(
  ':social_id' => $social_id
));

$res = $prepare->rowCount();
if ($res==1){
    echo("<p>réseau social supprimé</p>
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