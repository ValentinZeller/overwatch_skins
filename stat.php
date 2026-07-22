<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stat</title>
    <link rel="stylesheet" href="css/style.css" type="text/css"/>
    <link rel="icon" type="image/x-icon" href="image/logo.webp">
</head>
<?php
require_once('function.php');
require_once('controller/connect.php');
require_once("controller/SkinManager.php");
require_once("controller/StatSkins.php");
$db = ConnectBDD();
$skinManager = new SkinManager($db);

$skins = require_once("cache/skin_main.php");
$heroes = require_once("cache/hero_main.php");
$seasons = require_once("cache/season_main.php");
$categories = require_once("cache/category_main.php");
$rarities = ['epic','legendary','ultra','mythic'];

$headers;
foreach(StatType::cases() as $type) {
    $headers[] = array('id' => $type->id(), 'display' => $type->value);
}

?>
<style>
<?php foreach ($headers as $header): ?>
    [data-category="<?= $header['id'] ?>"] { background-color: <?= randomColor($header['id']) ?>; }
<?php endforeach; ?>
</style>
<body>
    <div id="open-setting" onclick="openSettings()">&#9881;</div>
    <div class="overlay" id="setting">
        <a href="javascript:void(0)" id="close-setting" onclick="closeSettings()">&times;</a>
        <div class="overlay-content">
            <a href="index">Home ↗</a>
            <?php include('template/nav_link.php'); ?>
            <div class="visual-settings">
                <button class='select-hero' id="sort-name" data-sort="asc" onclick="sortHeroes('name')">Sort Heroes Alphabetically</button>
                <button class='select-hero' id="sort-release-date" data-sort="desc" onclick="sortHeroes('release-date')">Sort Heroes by Release Date</button>
                <label>Category Colors <input type="checkbox" onchange="updateCategoryColor(event.target.checked);" checked id='categories-colors' /></label>
            </div>
        </div>
    </div>
    <div id="container" class="container">
        <?php include('template/stat_category.php'); ?>
        <?php foreach ($heroes as $hero): ?>
            <?php $filterSkins = $skinManager->filterSkinByHero($hero['name'], $skins); ?>
            <div class="row" id="<?= $hero['name'] ?>" data-name="<?= $hero['name'] ?>" data-release-date="<?= $hero['release_date'] ?>">
                <?php echo template('template/stat_skin.php', [
                    'hero' => $hero,
                    'headers' => $headers,
                    'rarities' => $rarities,
                    'filterSkins' => $filterSkins,
                    'skinManager' => $skinManager,
                    'seasons' => $seasons
                ]) ?>
                <?php foreach($categories as $category): ?>
                    <?php $filterSkinsCategory = $skinManager->filterSkinByCategory($category['name'], $filterSkins); ?>
                    <?php echo template('template/stat_skin.php', [
                        'hero' => $hero,
                        'headers' => $headers,
                        'rarities' => $rarities,
                        'filterSkins' => $filterSkinsCategory,
                        'skinManager' => $skinManager,
                        'seasons' => $seasons
                    ]) ?>
                <?php endforeach; ?>
            </div>
        <?php endforeach; ?>
        <?php include('template/stat_category.php'); ?>
    </div>
    <script src="js/lazy_loading.js" type="text/javascript"></script>
    <script src="js/main.js" type="text/javascript"></script>
    <script src="js/column_sort.js" type="text/javascript"></script>
</body>
</html>