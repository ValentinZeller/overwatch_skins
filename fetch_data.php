<?php
require_once('connect.php');
require_once('skin/SkinManager.php');
require_once('hero/HeroManager.php');
require_once('category/CategoryManager.php');
require_once('season/SeasonManager.php');
define('YEARS', [2016,2017,2018,2019,2020,2021,2022]);
define('MAX_SKIN_AMOUNT', 8);
define('CACHE_PATH', 'cache/');

$db = ConnectBDD();
$skinManager = new SkinManager($db);
$heroManager = new HeroManager($db);
$categoryManager = new CategoryManager($db);
$seasonManager = new SeasonManager($db);

if ($version == 'base') {
    $skinData = initialValue('base_skin','ow2',[$skinManager,'getBaseSkin']);
    $heroList = initialValue('hero','ow2',[$heroManager,'getListeHero']);
    $rarityList = ['common','rare','epic','legendary'];
    $categoryList = raritiesAsCategory($rarityList);
    $seasonList = null;
} else if ($version != null ) {
    $skinData = initialValue('skin',$version,[$skinManager,'getOWSkin']);
    $heroList = initialValue('hero',$version,[$heroManager,'getListeHero']);
    $categoryList = initialValue('category',$version,[$categoryManager,'getCategoryOW']);
    $seasonList = initialValue('season',$version,[$seasonManager,'getListeSeason']);
    $rarityList = ['rare','epic','legendary','mythic'];
    
    if ($version === 'ow1') {
        $seasonList = null;
        $rarityList = ['epic','legendary'];
    }
} else {
    $skinData = initialValue('all_skin','ow2',[$skinManager,'getListeSkin']);
    $heroList = initialValue('hero','ow2',[$heroManager,'getListeHero']);
    $categoryList = initialValue('all_category','ow2',[$categoryManager,'getListeCategory']);
    $seasonList = initialValue('season','ow2',[$seasonManager,'getListeSeason']);
    $rarityList = ['common','rare','epic','legendary','mythic'];
}

function initialValue($type,$version,$fetchFunction) {
    $list = null;
    if (file_exists(CACHE_PATH.$type.'_'.$version.'.php')) {
        // Load from cache
        $list = include(CACHE_PATH.$type.'_'.$version.'.php');
    } else {
        // Fetch from database and cache it
        $list = $fetchFunction($version);
        $list->setFetchMode(PDO::FETCH_ASSOC);
        $list = $list->fetchAll();
        file_put_contents(CACHE_PATH.$type.'_'.$version.'.php', '<?php return ' . var_export($list, true) . ';');
    }
    return $list;
}

function raritiesAsCategory($rarityList) {
    $rarities = array();
    foreach ($rarityList as $index => $rarity) {
        $rarities[$index] = array(
            'id' => $index + 1,
            'name' => $rarity,
            'icon_url' => 'https://foxyjr.cloudns.ph/overwatch_skins/image/rarity/'.$rarity.'.webp',
            'display_order' => $index + 1,
        );
    }
    return $rarities;
}

?>