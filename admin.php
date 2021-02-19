<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel='stylesheet' type='text/css' href='style.php'>
    <link rel='stylesheet' type='text/css' href='style-admin.css'>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Long+Cang&display=swap" rel="stylesheet">
</head>
<body>
    <div class="haut">
    <?php
    
    if (isset($_POST['modifier-couleurs'])){
        include ('crud/modifier-couleurs.php');
    } elseif (isset($_POST['modifier-textes'])){
        include ('crud/modifier-textes.php');
    } elseif (isset($_POST['modifier-reseau'])){
        include ('crud/modifier-reseau.php');
    } elseif (isset($_POST['supprimer-reseau'])){
        include ('crud/supprimer-reseau.php');
    } elseif (isset($_POST['submit'])){
        $login = htmlspecialchars($_POST['login'], ENT_QUOTES);
        $mdp = htmlspecialchars($_POST['mdp'], ENT_QUOTES);
        $hash='$2y$10$7yyiElK/z7eiIZFfv27cV.u0YsYX17pAC0lGrUEWX/f9kMDbDb04m';
        if ($login=='admin' and password_verify($mdp, $hash) === TRUE){
            echo("<p>bienvenue!</p>");
            include('data/data.php');
    ?>
    </div>

    <div class="gauche">    
    <form method='POST' action='admin.php'>
        <fieldset>
        <legend>Eléménts textes</legend>
        <label for='page_title'>Page_title</label></br>
        <input type='text' id='page_title' name='page_title' value="<?php echo $title_page ?>"></br>
        <label for='page_description'>Page_description</label></br>
        <input type='text' id='page_description' name='page_description' value="<?php echo $description_page ?>"></br>
        <label for='title'>Title</label></br>
        <input type='text' id='title' name='title' value="<?php echo $title ?>"></br>
        <label for='paragraphe'>Paragraphe</label></br>
        <textarea id='paragraphe' name='paragraphe' value= "<?php echo $paragraphe ?>" rows="5"><?php echo $paragraphe ?></textarea></br>
        <input class='ombre' type='submit' name='modifier-textes' value='modifier les textes'>
        </fieldset>
    </form>

    <form method="POST" action='admin.php'>
        <fieldset>
        <legend>Eléménts couleurs</legend>
        <label for='color'>Font color</label>
        <input type='color' id='color' name='color' value="<?php echo $color ?>">
        <label for='backColor'>Background color</label>
        <input type='color' id='backColor' name='backColor' value="<?php echo $backColor ?>"></br>
        <input class='ombre' type='submit' name='modifier-couleurs' value='modifier les couleurs'>
        </fieldset>
    </form>
    </div>

    <div class="droite">
        <fieldset>
        <legend>Eléménts réseaux sociaux__<button class="moyenButton ombre"><a href="crud/ajout-social.php">Ajouter un réseau social</a></button></legend>
        <?php
        include('data/recup-social.php');
        while ($reseau = $prepare_social->fetch()){
        ?>
        <form class='pointille' method='POST' action='admin.php'>
            <label><?php echo $reseau['social_name'] ?></label></br>
            <input type='text' name='social_name' value="<?php echo $reseau['social_name']?>"></br>
            <input type='text' name='social_url' value="<?php echo $reseau['social_url'] ?>"></br>
            <input type='text' name='social_img' value="<?php echo $reseau['social_img'] ?>"></br>
            <input class='ombre' type='submit' name='modifier-reseau' value='modifier ce réseau'>
            <input class='ombre' type='submit' name='supprimer-reseau' value='supprimer ce réseau'>
            <input type='hidden' name='social_id' value="<?php echo $reseau['social_id']?>"></br>
        </form>  
        <?php } ?> 
        </fieldset>
    </div>  

    <div class="retourLanding">
        <button class="grosButton ombre"><a href='index.php'>Retour à la landing page</a></button>  
    </div>
    <?php   
        } else {
            echo("<p>mauvaise authentification</p>");
            echo("<button class='moyenButton'><a href='login.php'>Retour</a></button>");
        }
    }
    ?>
     
</body>
</html>