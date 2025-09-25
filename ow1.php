<?php
$version = 'ow1';
require_once('render.php');
?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Overwatch Skins</title>
    <link rel="stylesheet" href="css/style.css" type="text/css"/>
    <link rel="icon" type="image/x-icon" href="image/logo.webp">
</head>
<body>
    <div id="setting" onclick="openNav()">&#9881;</div>
    <div class="overlay" id="myNav">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
          <div class="overlay-content">
            <a href="ow2">Overwatch 2 ↗</a>
            <a href="download.php">Download ↗</a>
            <?php
            renderVisualBar($rarityList);
            renderSettingForm($rarityList, $categoryList, $heroList, $seasonList, $bypassCheck, $rarities, $categories, $heroes, $seasons, $yearsSelected);
            ?>
        </div>
    </div>
    <div id="container" class="container">

    <?php

    renderCategory($categories, $maxSkinCategory, $manager);

    foreach ($heroes as $hero) {
        renderHeroSkin($hero, $categories, $skins, $maxSkinCategory, $manager);
    }

    renderTotal($categories, $maxSkinCategory, $skins, $manager);
    renderCategory($categories, $maxSkinCategory, $manager);
    ?>
    </div>
    <script src="js/main.js" type="text/javascript"></script>
</body>
</html>