<?php
require_once('connect.php');
require_once('skin/SkinManager.php');
require_once('hero/HeroManager.php');
require_once('category/CategoryManager.php');
require_once('season/SeasonManager.php');
define('YEARS', [2016,2017,2018,2019,2020,2021,2022]);
define('MAX_SKIN_AMOUNT', 8);

$db = ConnectBDD();
$skinManager = new SkinManager($db);
$heroManager = new HeroManager($db);
$categoryManager = new CategoryManager($db);
$seasonManager = new SeasonManager($db);

$skinData = $skinManager->getOWSkin($version);
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

?>