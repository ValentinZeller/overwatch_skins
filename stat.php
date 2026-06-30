<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stat</title>
    <link rel="stylesheet" href="css/style.css" type="text/css"/>
</head>
<?php
require_once('controller/connect.php');
require_once("controller/SkinManager.php");
$db = ConnectBDD();
$skinManager = new SkinManager($db);

$skins = require_once("cache/skin_main.php");
$heroes = require_once("cache/hero_main.php");
$seasons = require_once("cache/season_main.php");
$categories = ['total','seasons','average','last season','recolor'];
$rarities = ['epic','legendary','ultra','mythic'];

function categoryCalc($category, $skins, $hero, $seasons) {
    $result = 0;
    switch($category) {
        case 'total':
            $result = count($skins);
            break;
        case 'seasons':
            $firstSeason = array_search($hero['release_date'], array_column($seasons, 'start_date'));
            $firstSeason = ($firstSeason == null) ? 0 : $firstSeason;
            $nbSeasons = count($seasons) - $firstSeason;
            $with = 0;
            for($i=$firstSeason ; $i<=count($seasons) ; $i++) {
                $hasSkin = in_array($i, array_column($skins, 'id_season'));
                if ($hasSkin) {
                    $with++;
                }
            }
            $result = $with . '/' . $nbSeasons;
            break;
        case 'average':
            $firstSeason = array_search($hero['release_date'], array_column($seasons, 'start_date'));
            $nbSeasons = count($seasons) - $firstSeason;
            $result = round(count($skins) / $nbSeasons, 2);
            break;
        case 'last season':
            foreach($skins as $skin) {
                $result = ($skin['id_season'] > $result) ? $skin['id_season'] : $result;
            }
            break;
        case 'recolor':
            $recolors = array_filter($skins, function($skin) {
                if ($skin['recolor_of'] != null) {
                    return $skin;
                }
                return;
            });
            $result = count($recolors);
            break;
        default :
            break;
    }
    return $result;
}

?>
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
                <?php foreach ($categories as $category): ?>
                    <div title="<?= $category ?>" data-category="<?= $category ?>" class="item category category-title" style="width: calc(var(--width));"><?= $category ?></div>
                <?php endforeach; ?>
            <div class="row-header"></div>
        </div>
        <?php foreach ($heroes as $hero): ?>
            <?php $filterSkins = $skinManager->filterSkinByHero($hero['name'], $skins); ?>
            <div class="row">
                <div class="row-header" style="background-image: url('<?= $hero['portrait_url'] ?>');" title=<?= $hero['name'] ?> ></div>
                <?php foreach ($categories as $category): ?>
                    <div class="row-count">
                        <?php foreach ($rarities as $rarity): ?>
                            <?php $filterSkinsRarity = $skinManager->filterSkinByRarity($rarity, $filterSkins); 
                            $resultRarity = categoryCalc($category, $filterSkinsRarity, $hero, $seasons)?>
                            <p class="count <?= $rarity ?>-skin"><?= $resultRarity ?></p>
                        <?php endforeach; ?>
                        <?php $result = categoryCalc($category, $filterSkins, $hero, $seasons) ?>
                        <p class="count"><?= $result ?></p>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endforeach; ?>
        <div id='category' class='row row-category'>
            <div class='row-header'></div>
                <?php foreach ($categories as $category): ?>
                    <div title="<?= $category ?>" data-category="<?= $category ?>" class="item category category-title" style="width: calc(var(--width));"><?= $category ?></div>
                <?php endforeach; ?>
            <div class="row-header"></div>
        </div>
    </div>
    <script src="js/lazy_loading.js" type="text/javascript"></script>
    <script src="js/main.js" type="text/javascript"></script>
</body>
</html>