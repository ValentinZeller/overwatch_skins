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
require_once('connect.php');
require_once('skin/SkinManager.php');
define('CACHE_PATH', 'cache/hero/');

$id = $_GET['id'] ?? null;
if ($id === null) {
    echo "<div>No ID provided : <a href='index.php'>Return to homepage</a></div>";
    exit;
}

$db = ConnectBDD();
$skinManager = new SkinManager($db);
$skins = initialValue($id,$skinManager);

if (!$skins) {
    echo "<div>Hero not found : <a href='index.php'>Return to homepage</a></div>";
    exit;
}

function initialValue($id,$skinManager) {
    $list = null;
    if (file_exists(CACHE_PATH.$id.'.php')) {
        // Load from cache
        $list = include(CACHE_PATH.$id.'.php');
    } else {
        // Fetch from database and cache it
        $list = $skinManager->getSkinByHeroId($id);
        $list->setFetchMode(PDO::FETCH_ASSOC);
        $list = $list->fetchAll();
        file_put_contents(CACHE_PATH.$id.'.php', '<?php return ' . var_export($list, true) . ';');
    }
    return $list;
}

?>
<body>
    <div id="hero-gallery">
        <?php
        foreach ($skins as $skin) {
            $skin['image_url'] = str_replace("'", "\'", $skin['image_url']);
            ?>
            <a target="_blank" href="skin.php?id=<?= $skin['id'] ?>">
                <div class="item-gallery lazy-background <?= $skin['rarity'] ?> <?= $skin['recolor_of'] ? 'recolor' : '' ?>" title="<?= $skin['skin_name'] ?>" data-bg="url('<?= $skin['image_url'] ?>')">
                    <img loading="lazy" class="category-icon" src="<?= $skin['category_icon_url'] ?>">
                    <span class="item-name"><?= $skin['skin_name'] ?></span>
                </div>
            </a>
        <?php
        }
        ?>
    </div>
    <a href="index.php" class="back-home">← Back to Home</a>
    <script src="js/lazy_loading.js" type="text/javascript"></script>
</body>
</html>