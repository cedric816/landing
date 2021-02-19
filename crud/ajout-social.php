<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajout d'un réseau social</title>
    <link rel='stylesheet' type='text/css' href='../style.php'>
    <link rel='stylesheet' type='text/css' href='../style-admin.css'>
</head>
<body>

<?php
    if (isset($_POST['ajouter_social'])){
        include('../data/conf-bdd.php');
        $social_name = $_POST['social_name'];
        $social_url = $_POST['social_url'];
        $social_img = $_POST['social_img'];
    
        $requete = "INSERT INTO `social`(`social_name`, `social_url`, `social_img`) 
                    VALUES(:social_name, :social_url, :social_img)";
        $prepare = $connexion->prepare($requete);
        $prepare->execute(array(
        ':social_name' => $social_name,
        ':social_url' => $social_url,
        ':social_img' => $social_img
        ));
        $res = $prepare->rowCount();
        if ($res==1){
            echo("<p>réseau social ajouté</p>
            <form method='POST' action='../admin.php'>
            <input type='hidden' name='login' value='admin'>
            <input type='hidden' name='mdp' value='oui'>
            <input class='grosButton ombre' type='submit' name='submit' value='retour admin'>
            ");
        ?>
            <button class="grosButton ombre"><a href='../index.php'>Retour à la landing page</a></button>  
        <?php
        } else {
            echo("quelque chose n'a pas fonctionné...");
            }
    }else{
?>
    <div class="ajout">
    <form method="POST" action="ajout-social.php">
        <fieldset>
            <legend>Ajout d'un réseau social</legend>
            <label for="social_name">Nom du réseau</label></br>
            <input type="text" id="social_name" name="social_name"></br>
            <label for="social_url">URL du réseau</label></br>
            <input type="text" id="social_url" name="social_url"></br>
            <label for="social_img">Image du réseau(img/...)</label></br>
            <input type="text" id="social_img" name="social_img"></br>
            <input type="submit" name="ajouter_social" value="ajouter">
        </fieldset>
    </form>
    
            <form method='POST' action='../admin.php'>
            <input type='hidden' name='login' value='admin'>
            <input type='hidden' name='mdp' value='oui'>
            <input type='submit' name='submit' value='Annuler'>
            </form>
    </div> 

<?php
    }
?>
</body>
</html>