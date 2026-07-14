<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stat</title>
    <link rel="stylesheet" href="css/style.css" type="text/css"/>
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
            <a href="main">Overwatch Skins ↗</a>
            <a href="legacy">Legacy Skins ↗</a>
            <a href="base">Base Skins ↗</a>
            <a href="all">All Skins ↗</a>
            <a href="season">Seasons ↗</a>
            <a href="download">Download ↗</a>
            <div class="visual-settings">
                <span id='show-hide-text'>Visual change : </span>
                <?php foreach ($rarities as $rarity): ?>
                    <label class="<?= $rarity ?>-skin rarity">
                        <?= $rarity ?>
                        <input type="checkbox" onchange="checkBarVisibility(event);" checked data-rarity="<?= $rarity ?>" />
                    </label>
                <?php endforeach ?>
                <button class='select-hero' id="sort-name" data-sort="asc" onclick="sortHeroes('name')">Sort Heroes Alphabetically</button>
                <button class='select-hero' id="sort-release-date" data-sort="desc" onclick="sortHeroes('release-date')">Sort Heroes by Release Date</button>
                <label>Category Colors <input type="checkbox" onchange="updateCategoryColor(event.target.checked);" checked id='categories-colors' /></label>
                <label>Recolors <input type="checkbox" onchange="updateRecolors(event.target.checked);" checked id='display-recolors' /></label>
            </div>
        </div>
    </div>
    <div id="container" class="container">
        <div id='category' class='row row-category'>
            <div class='row-header'></div>
                <?php foreach ($headers as $header): ?>
                    <div title="<?= $header['id'] ?>" data-category="<?= $header['id'] ?>" class="item category category-title" style="width: calc(var(--width));"><?= $header['display'] ?></div>
                <?php endforeach; ?>
                <?php foreach ($categories as $category): ?>
                    <div class='row-header'></div>
                    <?php foreach ($headers as $header): ?>
                        <div title="<?= $header['id'] ?>" data-category="<?= $header['id'] ?>" class="item category category-title" style="width: calc(var(--width));"><?= $header['display'] . ' ' . $category['name'] ?></div>
                    <?php endforeach ?>
                <?php endforeach ?>
            <div class="row-header"></div>
        </div>
        <?php foreach ($heroes as $hero): ?>
            <?php $filterSkins = $skinManager->filterSkinByHero($hero['name'], $skins); ?>
            <div class="row">
                <div class="row-header" style="background-image: url('image/hero_portrait/<?= $hero['portrait_url'] ?>');" title=<?= $hero['name'] ?> ></div>
                <?php foreach ($headers as $header): ?>
                    <div class="row-count" data-category="<?= $header['id'] ?>">
                        <?php foreach ($rarities as $rarity): ?>
                            <?php $filterSkinsRarity = $skinManager->filterSkinByRarity($rarity, $filterSkins); 
                                $stat =  new StatSkins($filterSkinsRarity, $hero, $seasons);
                                $resultRarity = $stat->results()[$header['id']] ?>
                                <p class="count <?= $rarity ?>-skin"><?= $resultRarity ?></p>
                        <?php endforeach; ?>
                        <?php $stat = new StatSkins($filterSkins, $hero, $seasons); ?>
                        <?php $result = $stat->results()[$header['id']] ?>
                        <p class="count"><?= $result ?></p>
                    </div>
                <?php endforeach; ?>
                <?php foreach($categories as $category): ?>
                    <?php $filterSkinsCategory = $skinManager->filterSkinByCategory($category['name'], $filterSkins); ?>
                    <div class="row-header" style="background-image: url('image/hero_portrait/<?= $hero['portrait_url'] ?>');" title=<?= $hero['name'] ?> ></div>
                    <?php foreach($headers as $header): ?>
                        <div class="row-count" data-category="<?= $header['id'] ?>">
                            <?php foreach ($rarities as $rarity): ?>
                                <?php $filterSkinsRarity = $skinManager->filterSkinByRarity($rarity, $filterSkinsCategory);
                                    $stat =  new StatSkins($filterSkinsRarity, $hero, $seasons);
                                    $resultRarity = $stat->results()[$header['id']] ?>
                                    <p class="count <?= $rarity ?>-skin"><?= $resultRarity ?></p>
                            <?php endforeach; ?>
                            <?php $stat = new StatSkins($filterSkinsCategory, $hero, $seasons); ?>
                            <?php $result = $stat->results()[$header['id']] ?>
                            <p class="count"><?= $result ?></p>
                        </div>
                    <?php endforeach; ?>
                <?php endforeach; ?>
            </div>
        <?php endforeach; ?>
        <div id='category' class='row row-category'>
            <div class='row-header'></div>
                <?php foreach ($headers as $header): ?>
                    <div title="<?= $header['id'] ?>" data-category="<?= $header['id'] ?>" class="item category category-title" style="width: calc(var(--width));"><?= $header['display'] ?></div>
                <?php endforeach; ?>
                <?php foreach ($categories as $category): ?>
                    <div class='row-header'></div>
                    <?php foreach ($headers as $header): ?>
                        <div title="<?= $header['id'] ?>" data-category="<?= $header['id'] ?>" class="item category category-title" style="width: calc(var(--width));"><?= $header['display'] . ' ' . $category['name'] ?></div>
                    <?php endforeach ?>
                <?php endforeach ?>
            <div class="row-header"></div>
        </div>
    </div>
    <script src="js/lazy_loading.js" type="text/javascript"></script>
    <script src="js/main.js" type="text/javascript"></script>
</body>
</html>