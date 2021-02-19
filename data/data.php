<?php
    include('conf-bdd.php');
    include('recup-color.php');
    $color = htmlspecialchars($prepare_color['color_font'], ENT_QUOTES);
    $backColor = htmlspecialchars($prepare_color['color_back'], ENT_QUOTES);

    include('recup-text.php');
    $title_page = htmlspecialchars($prepare_text['text_title_page'], ENT_QUOTES);
    $description_page = htmlspecialchars($prepare_text['text_descrip_page'], ENT_QUOTES);
    $title = htmlspecialchars($prepare_text['text_title'], ENT_QUOTES);
    $paragraphe = htmlspecialchars($prepare_text['text_paragraphe'], ENT_QUOTES);

    include('recup-social.php');
    $reseaux=[];
    while ($social = $prepare_social->fetch()){
        $reseaux[htmlspecialchars($social['social_name'], ENT_QUOTES)]=htmlspecialchars($social['social_url'], ENT_QUOTES);
    }
?>