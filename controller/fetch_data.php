<?php
require_once('connect.php');
require_once('SkinManager.php');
require_once('HeroManager.php');
require_once('CategoryManager.php');
require_once('SeasonManager.php');
require_once('ChapterManager.php');
define('YEARS', [2016,2017,2018,2019,2020,2021,2022]);
define('MAX_SKIN_AMOUNT', 8);
define('CACHE_PATH', 'cache/');
define('RARITY', ['common','rare','epic','legendary','ultra','evolution','mythic']);

$db = ConnectBDD();
$skinManager = new SkinManager($db);
$heroManager = new HeroManager($db);
$categoryManager = new CategoryManager($db);
$seasonManager = new SeasonManager($db);
$chapterManager = new ChapterManager($db);

if ($version == 'category') {
    $c = $categoryManager->getCategoryById($id_category);
    $skinData = initialValue('category_skin',$id_category,[$skinManager,'getSkinByCategoryId']);
    $heroList = initialValue('hero','main',[$heroManager,'getListeHero']);
    $rarityList = getRarities($skinData);
    $categoryList[] = ['name' => 'Category'];
    $seasonList = null;
    $chapterList = null;
} else if ($version == 'season') {
    $skinData = initialValue('skin','season',[$skinManager,'getSeasonSkin']);
    $heroList = initialValue('hero','main',[$heroManager,'getListeHero']);
    $seasonList = initialValue('season','main',[$seasonManager,'getListeSeason']);
    $chapterList = initialValue('chapter','main',[$chapterManager,'getListeChapter']);
    $rarityList = getRarities($skinData);
    $categoryList = initialValue('category','main',[$categoryManager,'getCategoryOW']);
} else if ($version != null ) {
    $skinData = initialValue('skin',$version,[$skinManager,'getOWSkin']);
    $heroList = initialValue('hero',$version,[$heroManager,'getListeHero']);
    $categoryList = initialValue('category',$version,[$categoryManager,'getCategoryOW']);
    $seasonList = initialValue('season',$version,[$seasonManager,'getListeSeason']);
    $chapterList = initialValue('chapter',$version,[$chapterManager,'getListeChapter']);
    $rarityList = getRarities($skinData);
    
    if ($version === 'legacy') {
        $seasonList = null;
    }
} else {
    $skinData = initialValue('all_skin','main',[$skinManager,'getListeSkin']);
    $heroList = initialValue('hero','main',[$heroManager,'getListeHero']);
    $categoryList = initialValue('all_category','main',[$categoryManager,'getListeCategory']);
    $seasonList = initialValue('season','main',[$seasonManager,'getListeSeason']);
    $rarityList = getRarities($skinData);
    $chapterList = initialValue('chapter','main',[$chapterManager,'getListeChapter']);
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

function getRarities($skin) {
    $rarityList = [];
    foreach(RARITY as $rarity) {
        if (in_array($rarity, array_column($skin, 'rarity'))) {
            $rarityList[] = $rarity;
        }
    }
    return $rarityList;
}

?>