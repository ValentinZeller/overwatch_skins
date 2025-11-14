<?php
$skins = NULL;
$heroes = NULL;
$categories = NULL;
$rarities = NULL;
$seasons = NULL;
$yearsSelected = NULL;

$maxSkinCategory = [];

$filtered = ['hero' => false, 'category' => false, 'rarity' => false, 'season' => false, 'year' => false];

setupArrayByFilter('hero', $heroes, $heroList, $filtered, $heroList);
setupArrayByFilter('category', $categories, $categoryList, $filtered, $categoryList);
setupArrayByFilter('rarity', $rarities, $rarityList, $filtered);
if ($version == 'ow2') {
    $seasonIdList = array_map(function($season) { return $season['id']; }, $seasonList);
    setupArrayByFilter('season', $seasons, $seasonIdList, $filtered);
} else if ($version == 'ow1') {
    setupArrayByFilter('year', $yearsSelected, YEARS, $filtered);
} else if ($version == null) {
    $seasonIdList = array_map(function($season) { return $season['id']; }, $seasonList);
    setupArrayByFilter('season', $seasons, $seasonIdList, $filtered);
    setupArrayByFilter('year', $yearsSelected, YEARS, $filtered);
}

filterSkin($skinData, $version, $heroes, $categories, $rarities, $seasons, $yearsSelected, $skins);
$maxSkinCategory = getMaxSkinCategory($categoryList, $heroList, $skins, $skinManager);

function getMaxSkinCategory($categories, $heroes, $skins, $manager) {
    $maxSkinCategory = [];
    foreach ($categories as $category) {
        $maxSkinCategory[$category['name']] = 0;
        foreach($heroes as $hero) {
            $filterSkinCount = count($manager->filterSkinByHeroAndCategory($hero['name'], $category['name'], $skins));
            $maxSkinCategory[$category['name']] = max($maxSkinCategory[$category['name']], $filterSkinCount);
        }
    }
    return $maxSkinCategory;
}

function setupArrayByFilter($key, &$array, $defaut, &$filtered, $list = null) {
    if (isset($_POST[$key])) {
        $filtered[$key] = true;
        foreach ($_POST[$key] as $value) {
            if ($list) {
                $array[] = $list[array_search($value, array_column($list, 'name'))];
            } else {
                $array[] = $value;
            }
        }
    } else {
        $array = $defaut;
    }
}

function filterSkin($skinData, $version, $heroes, $categories, $rarities, $seasons, $yearsSelected, &$skins) {
    if (isset($_POST['hero']) || isset($_POST['category']) || isset($_POST['rarity']) || isset($_POST['season']) || isset($_POST['year'])) {
        foreach ($skinData as $skin) {
            
            if (in_array($skin['hero_name'], array_column($heroes, 'name')) &&
            in_array($skin['category_name'], array_column($categories, 'name')) &&
            in_array($skin['rarity'], $rarities) &&
            ( ($version == 'ow1' && in_array($skin['year'], $yearsSelected)) ||
            ($version == 'ow2' && in_array($skin['id_season'], $seasons)) || 
            ($version == 'base') )
            ) {
                $skins[] = $skin;
            }
        }
    } else {
        $skins = $skinData;
    }
}

?>