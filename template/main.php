<?php require_once('function.php'); ?>
<?php require_once('fetch_data.php'); ?>
<?php require_once('filter_data.php'); ?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Overwatch Skins</title>
    <link rel="stylesheet" href="css/style.css" type="text/css"/>
    <link rel="icon" type="image/x-icon" href="image/logo.webp">
    <?php echo template('template/category_color.php', ['categories' => $categories, 'maxSkinCategory' => $maxSkinCategory]); ?>
</head>
<body>
    <div id="open-setting" onclick="openSettings()">&#9881;</div>
    <div class="overlay" id="setting">
        <a href="javascript:void(0)" id="close-setting" onclick="closeSettings()">&times;</a>
        <div class="overlay-content">
            <a href="index">Home ↗</a>
            <a href="main">Overwatch Skins ↗</a>
            <a href="legacy">Legacy Skins ↗</a>
            <a href="base">Base Skin ↗</a>
            <a href="all">All Skins ↗</a>
            <a href="download">Download ↗</a>
            <?php echo template('template/visual_settings.php', ['rarities' => $rarityList]); ?>
            <?php echo template('template/filter_form.php', [
                'rarityList' => $rarityList,
                'categoryList' => $categoryList,
                'heroList' => $heroList,
                'seasonList' => $seasonList,
                'filtered' => $filtered,
                'rarities' => $rarities,
                'categories' => $categories,
                'heroes' => $heroes,
                'seasons' => $seasons,
                'yearsSelected' => $yearsSelected,
                'chapterList' => $chapterList,
                'version' => $version
            ]); ?>
        </div>
    </div>
    <div id="container" class="container">

    <?php
    echo template('template/category.php', [
        'maxSkinCategory' => $maxSkinCategory,
        'categories' => $categories
    ]);

    foreach ($heroes as $hero) {
        echo template('template/hero_skin.php', [
            'hero' => $hero,
            'categories' => $categories,
            'skinData' => $skins,
            'maxSkinCategory' => $maxSkinCategory,
            'rarities' => $rarities,
            'manager' => $skinManager
        ]);
    }
    echo template('template/total.php', [
        'categories' => $categories,
        'maxSkinCategory' => $maxSkinCategory,
        'skinData' => $skins,
        'manager' => $skinManager,
        'rarities' => $rarities
    ]);

    echo template('template/category.php', [
        'maxSkinCategory' => $maxSkinCategory,
        'categories' => $categories
    ]);
    ?>
    </div>
    <script src="js/lazy_loading.js" type="text/javascript"></script>
    <script src="js/main.js" type="text/javascript"></script>
</body>
</html>