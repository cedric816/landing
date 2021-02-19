<?php
include('data/data.php');
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content= '<?php echo $description_page ?>'>
    <title><?php echo $title_page ?></title>
    <!--style avec variables php-->
    <link rel='stylesheet' type='text/css' href='style.php' />
    <!--style sans variables php-->
    <link rel='stylesheet' type='text/css' href='style.css' />
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Long+Cang&display=swap" rel="stylesheet">
</head>
<body>
    <div class="haut">
        <h1><?php echo $title ?></h1>
        <p><?php echo $paragraphe ?></p>
    </div>
    <div class="bas">
        <h2>Retrouvez-moi sur:</h2>
        <div class="listing">
            <?php
                include('data/recup-social.php');
                while ($reseau = $prepare_social -> fetch()){
                    echo ("<a target=_blank href=".$reseau['social_url']."><img class='icone' src=".$reseau['social_img']."></a>");
                }
            ?>
        </div>   
    </div> 
    <div class="corner">
    <?php
    echo (htmlentities('<ul class= \'skills\'> <li>html</li> <li>css</li> <li>js</li> </ul>'));
    ?>
    </div>  
    <div class="smallCorner">
    <?php
    echo (htmlentities('<div class= \'rotate\'>       </div>'));
    ?>
    </div>
    <div class="tinyCorner">
    <?php
    echo (htmlentities('<?php echo (\'\'); ?>'));
    ?>
    </div>
</body>
</html>
