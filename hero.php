<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Hero Gallery</title>
    <link rel="stylesheet" href="css/style.css" type="text/css"/>
    <link rel="icon" type="image/x-icon" href="image/logo.webp">
</head>
<?php
require_once('controller/connect.php');
require_once('controller/SkinManager.php');
define('HERO_PATH', 'cache/hero/');

$id = $_GET['id'] ?? null;
if ($id === null) {
    echo "<div>No ID provided : <a href='index.php'>Return to homepage</a></div>";
    exit;
}

$db = ConnectBDD();
$skinManager = new SkinManager($db);
$skins = initialValueSkin($id,$skinManager);
foreach($skins as $skin) {

}

if (!$skins) {
    echo "<div>Hero not found : <a href='index.php'>Return to homepage</a></div>";
    exit;
}

function initialValueSkin($id,$skinManager) {
    $list = null;
    if (file_exists(HERO_PATH.$id.'.php')) {
        // Load from cache
        $list = include(HERO_PATH.$id.'.php');
    } else {
        // Fetch from database and cache it
        $list = $skinManager->getSkinByHeroId($id);
        $list->setFetchMode(PDO::FETCH_ASSOC);
        $list = $list->fetchAll();
        file_put_contents(HERO_PATH.$id.'.php', '<?php return ' . var_export($list, true) . ';');
    }
    return $list;
}

?>
<body>
    <?php if(isset($_GET['ingame'])): ?>
            <div id="skin-main">
        <form id="skin-selection" class="skin-select">
            <a href="index">Home ↗</a>
            <a href="hero.php?id=<?= $_GET['id'] ?>">Feed view</a>
            <div onclick="hero.showModal()" id="change-hero">Change Hero</div>
            <?php foreach($skins as $skin): ?>
                <?php if ($skin['id_category'] == 15 || $skin['id_category'] == 18 || $skin['id_category'] == 19) {
                    $skin['category_icon_url'] = 'https://foxyjr.cloudns.ph/overwatch_skins/image/category/shop.webp';
                } else if($skin['id_category'] == 5 ) {
                    $skin['category_icon_url'] = 'https://foxyjr.cloudns.ph/overwatch_skins/image/category/blizzard.webp';
                }?>
                <div class="skin-name">
                    <label for="<?= $skin['id'] ?>">
                        <?php if($skin['id_category'] != 16 && $skin['id_category'] != 11): ?>
                            <img loading="lazy" class="" src="<?= $skin['category_icon_url'] ?>">
                        <?php endif; ?>
                        <span class="<?= $skin['rarity'] ?>-skin"> 
                            <?= $skin['skin_name'] ?>
                        </span>
                        <input id="<?= $skin['id'] ?>" type="radio" name="skin" value="<?= $skin['image_url'] ?>">
                    </label>
                </div>
            <?php endforeach ?>
        </form>
        <div id="skin-display" class="skin-select">
            <img id="img-display" src="">
        </div>
    </div>
    <?php else: ?>
    <div id="skin-topbar">
        <a href="index.php" class="back-home">Home ↗</a>
        <span> - </span>
        <a href="hero.php?id=<?= $_GET['id'] ?>&ingame">Gallery view</a>
        <span> - </span>
        <span onclick="hero.showModal()" id="change-hero">Change Hero</span>
    </div>
    <div id="hero-gallery">
        <?php foreach ($skins as $skin): ?>
            <?php $skin['image_url'] = str_replace("'", "\'", $skin['image_url']); ?>
            <a target="_blank" href="skin.php?id=<?= $skin['id'] ?>">
                <div class="item-gallery lazy-background <?= $skin['rarity'] ?> <?= $skin['recolor_of'] ? 'recolor' : '' ?>" title="<?= $skin['skin_name'] ?>" data-bg="url('<?= $skin['image_url'] ?>')">
                    <img loading="lazy" class="category-icon" src="<?= $skin['category_icon_url'] ?>">
                    <span class="item-name"><?= $skin['skin_name'] ?></span>
                </div>
            </a>
        <?php endforeach; ?>
    </div>
    <?php endif; ?>
    <dialog id="hero" class="hero-dialog">
        <?php include('template/hero_selection.php') ?>
        <div href="javascript:void(0)" id="close-setting" onclick="hero.close()">&times;</div>
    </dialog>
    <script src="js/skin_selection.js" type="text/javascript"></script>
    <script src="js/lazy_loading.js" type="text/javascript"></script>
</body>
</html>