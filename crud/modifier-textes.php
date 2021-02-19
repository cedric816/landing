<?php
include ('data/conf-bdd.php');
$text_title_page = $_POST['page_title'];
$text_descrip_page = $_POST['page_description'];
$title = $_POST['title'];
$paragraphe = $_POST['paragraphe'];

$requete ="UPDATE `text` 
            SET `text_title_page` = :text_title_page, 
                `text_descrip_page` = :text_descrip_page,
                `text_title` = :title,
                `text_paragraphe` = :paragraphe WHERE `text_id`= :id";
$prepare = $connexion->prepare($requete);
$prepare->execute(array(
  ':text_title_page' => $text_title_page,
  ':text_descrip_page' => $text_descrip_page,
  ':title' => $title,
  ':paragraphe' => $paragraphe,
  ':id' => 1
));

$res = $prepare->rowCount();
if ($res==1){
    echo("<p>textes modifiés</p>
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