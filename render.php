<?php
require_once('connect.php');
require_once('skin/SkinManager.php');
require_once('hero/HeroManager.php');
require_once('category/CategoryManager.php');
require_once('season/SeasonManager.php');
define('YEARS', [2016,2017,2018,2019,2020,2021,2022]);
define('MAX_SKIN_AMOUNT', 8);

$db = ConnectBDD();
$manager = new SkinManager($db);
$heroManager = new HeroManager($db);
$categoryManager = new CategoryManager($db);
$seasonManager = new SeasonManager($db);

$skinData = $manager->getOWSkin($version);
$skinData->setFetchMode(PDO::FETCH_ASSOC);
$skinData = $skinData->fetchAll();

$heroList = $heroManager->getListeHero($version);
$heroList->setFetchMode(PDO::FETCH_ASSOC);
$heroList = $heroList->fetchAll();

$categoryList = $categoryManager->getCategoryOW($version);
$categoryList->setFetchMode(PDO::FETCH_ASSOC);
$categoryList = $categoryList->fetchAll();

if ($version === 'ow2') {
    $seasonList = $seasonManager->getListeSeason();
    $seasonList->setFetchMode(PDO::FETCH_ASSOC);
    $seasonList = $seasonList->fetchAll();
} else {
    $seasonList = null;
}

$rarityList = ['epic','legendary'];
if ($version === 'ow2') {
    $rarityList = ['rare','epic','legendary','mythic'];
}

$skins = NULL;
$heroes = NULL;
$categories = NULL;
$rarities = NULL;
$seasons = NULL;

$maxSkinCategory = [];

$bypassCheck = ['hero' => true, 'category' => true, 'rarity' => true, 'season' => true, 'year' => true];

if (isset($_POST['hero'])) {
    $bypassCheck['hero'] = false;
    foreach ($_POST['hero'] as $hero) {
        $heroes[] = $heroManager->filterHeroByName($hero, $heroList)[0];
    }
} else {
    $heroes = $heroList;
}

if (isset($_POST['category'])) {
    $bypassCheck['category'] = false;
    foreach ($_POST['category'] as $category) {
        $categories[] = $categoryManager->filterCategoryByName($category, $categoryList)[0];
    }
} else {
    $categories = $categoryList;
}

if (isset($_POST['rarity'])) {
    $bypassCheck['rarity'] = false;
    foreach ($_POST['rarity'] as $rarity) {
        $rarities[] = $rarity;
    }
} else {
    $rarities = $rarityList;
}

if (isset($_POST['season'])) {
    $bypassCheck['season'] = false;
    foreach ($_POST['season'] as $season) {
        $seasons[] = $season;
    }
} else if ($version === 'ow2') {
    $seasons = array_map(function($season) { return $season['id']; }, $seasonList);
}

if (isset($_POST['year'])) {
    $bypassCheck['year'] = false;
    foreach ($_POST['year'] as $year) {
        $yearsSelected[] = $year;
    }
} else {
    $yearsSelected = YEARS;
}

if (isset($_POST['hero']) || isset($_POST['category']) || isset($_POST['rarity']) || isset($_POST['season']) || isset($_POST['year'])) {
    foreach($heroes as $hero) {
        foreach ($categories as $category) {
            $filterSkin = $manager->filterSkinByHeroAndCategory($hero['name'], $category['name'], $skinData);
            if ($filterSkin) {
                foreach ($filterSkin as $skin) {
                    if ($version == 'ow1') {
                        if (in_array($skin['year'], $yearsSelected) && in_array($skin['rarity'], $rarities)) {
                            $skins[] = $skin;
                        }
                    } else if ($version == 'ow2') {
                        if (in_array($skin['rarity'], $rarities) && in_array($skin['id_season'], $seasons)) {
                            $skins[] = $skin;
                        }
                    }
                }
            }
        }
    }
} else {
    $skins = $skinData;
}

foreach ($categories as $category) {
    $maxSkinCategory[$category['name']] = 0;
    foreach($heroes as $hero) {
        $filterSkinCount = count($manager->filterSkinByHeroAndCategory($hero['name'], $category['name'], $skins));
        $maxSkinCategory[$category['name']] = max($maxSkinCategory[$category['name']], $filterSkinCount);
    }
}

echo "<style>";
foreach ($categories as $category) {
    $nbColumn = getNbColumn($category, $maxSkinCategory, $manager);
    echo "[data-category=\"".$category['name']."\"] { background-color: ".randomColor($category['id'])."; }";
}
echo "</style>";

function randomColor($seed) {
    if ($seed) {
        mt_srand($seed+1);
    }
    $letters = '0123456789ABCDEF';
    $color = '#';
    for ($i = 0; $i < 6; $i++) {
        $color .= $letters[rand(0, 15)];
    }
    $color .= '40';
    return $color;
}

function split($count, $nbColumn) {
    $splitClass = "item lazy-background";
    $split = ceil($count/$nbColumn);
    switch($split) {
        case 2:
            $splitClass .= " half-column";
            break;
        case 3: case 4:
            $splitClass .= " half-column half-row";
            break;
        case 5: case 6: case 7: case 8:
            $splitClass .= " quarter-column half-row";
            break;
    }
    return $splitClass;
}

function getNbColumn($category, $maxSkinCategory, $manager) {
    return max(ceil($maxSkinCategory[$category['name']] / MAX_SKIN_AMOUNT), 1);
}

function renderCategory($categoryList, $maxSkinCategory, $manager) {
    echo "<div id='category' class='row rowCategory'><div class='rowHeader'></div>";
    foreach ($categoryList as $category) {
        $nbColumn = getNbColumn($category, $maxSkinCategory, $manager);
        echo "<div data-category=\"".$category['name']."\" class='item category' style=\"background-image: url('".$category['icon_url']."'); width: calc(var(--width) * ".$nbColumn.");\"></div>";
    }
    echo "<div class='item category' style=\"background-image: url('https://foxyjr.cloudns.ph/overwatch_skins/image/category/total.webp');\"></div>";
    echo "<div class='rowHeader'></div>";
    echo "</div>";
}

function renderHeroSkin($hero, $categoryList, $skinData, $maxSkinCategory, $manager) {
    echo "<div class=\"row\" id=\"".$hero['name']."\" data-count=\"".count($manager->filterSkinByHero($hero['name'], $skinData))."\">";
    echo "<div class=\"rowHeader\" style=\"background-image: url('".$hero['portrait_url']."');\"></div>";
    foreach ($categoryList as $category) {
        $nbColumn = getNbColumn($category, $maxSkinCategory, $manager);
        echo "<div data-category=\"".$category['name']."\" class=\"cell \" style=\"width: calc(var(--width) * ".$nbColumn.");\">";
        $filterSkin = $manager->filterSkinByHeroAndCategory($hero['name'], $category['name'], $skinData);
        $filterSkinCount = count($filterSkin);
        if ($filterSkinCount > 0) {
            foreach ($filterSkin as $skin) {
                echo "<a target=\"_blank\" href=\"".$skin['image_url']."\">";
                $skin['image_url'] = str_replace("'", "\'", $skin['image_url']);
                echo "<div class=\"" . split($filterSkinCount, $nbColumn) . " ".$skin['rarity']."\" data-bg=\"url('".renameFile($skin['image_url'])."')\" title=\"".$skin['skin_name']."\"></div></a>";
            }
        } else {
            echo "<div class=\"item\"></div>";
        }
        echo "</div>";
    }
    echo "<div class=\"rowCount\">";
    renderByRarity($manager->filterSkinByHero($hero['name'], $skinData), $manager);
    echo "</div>";
    echo "<div class=\"rowHeader\" style=\"background-image: url('".$hero['portrait_url']."');\"></div>";
    echo "</div>";
}

function renameFile($filename) {
    $pathinfo = pathinfo($filename);
    return $pathinfo['dirname'] . '/' . $pathinfo['filename'] . '_web.' . $pathinfo['extension'];
}

function renderByRarity($skinData, $manager) {
    $rarity = ['common', 'rare', 'epic', 'legendary','mythic'];
    foreach ($rarity as $r) {
        $filterSkin = $manager->filterSkinByRarity($r, $skinData);
        $filterSkinCount = count($filterSkin);
        if ($filterSkinCount > 0) {
            echo "<p class=\"count  ".$r."Skin\">".$filterSkinCount."</p>";
        }
    }
    echo "<p class=\"count\">".count($skinData)."</p>";
}

function renderTotal($categoryList, $maxSkinCategory, $skinData, $skinManager) {
    echo "<div id=\"total\" class=\"row total\">";
    echo "<div class=\"rowHeader\" style=\"background-image: url('https://foxyjr.cloudns.ph/overwatch_skins/image/category/total.webp');\"></div>";
    foreach ($categoryList as $category) {
        $filterSkin = $skinManager->filterSkinByCategory($category['name'], $skinData);
        $filterSkinCount = count($filterSkin);
        $nbColumn = getNbColumn($category, $maxSkinCategory, $skinManager);
        echo "<div class=\"rowCount\" data-category=\"".$category['name']."\" style=\"width: calc(var(--width) * ".$nbColumn.");\" >";
        renderByRarity($filterSkin, $skinManager);
        echo "</div>";
    }
    echo "<div class=\"rowCount\">";
    renderByRarity($skinData, $skinManager);
    echo "</div><div class=\"rowHeader\"></div></div>";
}

function renderVisualBar($rarityList) {
    echo "<div class=\"visual-bar\">";
    echo "<span id='show'>Show/Hide Rarity bar : </span>";
    foreach ($rarityList as $rarity) {
        echo "<label class=\"".$rarity."Skin rarity\">".$rarity." <input type=\"checkbox\" onchange=\"manageBar(event);\" checked data-rarity=\"".$rarity."\" /></label>";
    }
    echo "<button class='select-hero' onclick=\"sortHeroes()\">Sort Heroes by Skin Amount</button>";
    echo "<button class='select-hero' onclick=\"sortAlph()\">Sort Heroes Alphabetically</button>";
    echo "<label>Category Colors <input type=\"checkbox\" onchange=\"updateCategoryColor(event.target.checked);\" checked id='categoriesColors' /></label>";
    echo "</div>";
}

function renderSettingForm($rarityList, $categoryList, $heroList, $seasonList, $bypassCheck, $rarities, $categories, $heroes, $seasons, $yearsSelected = []) {
    echo "<h3>Filter :</h3><form method=\"post\"><div id=\"filter-form\"><div class=\"rarity-filter filter-section\">";
    foreach ($rarityList as $rarity) {
        echo "<label class=\"".$rarity."Skin rarity\"><input type=\"checkbox\" name=\"rarity[]\" value=\"".$rarity."\" ". (in_array($rarity, $rarities)&&!$bypassCheck['rarity'] ? "checked" : "") ."> ".$rarity."</label>";
    }
    echo "</div><div class=\"category-filter filter-section\">";
    foreach ($categoryList as $category) {
        echo "<label class=\"category\"><input type=\"checkbox\" name=\"category[]\" value=\"".$category['name']."\" ". (in_array($category, $categories)&&!$bypassCheck['category'] ? "checked" : "") ."> ".$category['name']."</label>";
    }         
    echo "</div><div class=\"hero-filter filter-section\"><div id=\"select-buttons\">";
    echo "<button type=\"button\" class='select-hero' onclick=\"selectRole('tank')\">Select Tanks</button>";
    echo "<button type=\"button\" class='select-hero' onclick=\"selectRole('damage')\">Select Damages</button>";
    echo "<button type=\"button\" class='select-hero' onclick=\"selectRole('support')\">Select Supports</button>";
    echo "<button type=\"button\" class='select-hero' onclick=\"unselectHeroes()\">Unselect All</button></div>";
    foreach ($heroList as $hero) {
        if ($hero['name'] == 'Doomfist' && $seasonList == null) {
            $hero['role'] = 'damage';
        }
        echo "<label class=\"hero\"><input type=\"checkbox\" data-role=\"".$hero['role']."\" name=\"hero[]\" value=\"".$hero['name']."\" ". (in_array($hero, $heroes)&&!$bypassCheck['hero'] ? "checked" : "") ."> <img width=\"50px\" src=\"".$hero['portrait_url']."\"/></label>";
    }
    echo "</div>";
    if ($seasonList != null) {
        echo "<div class=\"season-filter filter-section\">";
        foreach ($seasonList as $season) {
            echo "<label class=\"season\"><input type=\"checkbox\" name=\"season[]\" value=\"".$season['id']."\" ". (in_array($season['id'], $seasons)&&!$bypassCheck['season'] ? "checked" : "") ."> ".$season['name']."</label>";
        }
        echo "</div>";
    } else {
        echo "<div class=\"season-filter filter-section\">";
        foreach (YEARS as $year) {
            echo "<label class=\"season\"><input type=\"checkbox\" name=\"year[]\" value=\"".$year."\" ".(in_array($year, $yearsSelected)&&!$bypassCheck['year'] ? "checked" : "") ."> ".$year."</label>";
        }
        echo "</div>";
    }
    echo "</div>";
    echo "</div><div id=\"form-button\"><button type=\"submit\">Filter</button></div></form>";
}

?>