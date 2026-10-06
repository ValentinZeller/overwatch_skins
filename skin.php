<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Skin Details</title>
    <link rel="stylesheet" href="css/style.css" type="text/css"/>
    <link rel="icon" type="image/x-icon" href="image/logo.webp">
</head>
<?php
require_once('controller/connect.php');
require_once('controller/SkinManager.php');

$id = $_GET['id'] ?? null;
if ($id === null) {
    echo "<div>No skin ID provided : <a href='index.php'>Return to homepage</a></div>";
    exit;
}

$db = ConnectBDD();
$skinManager = new SkinManager($db);
$skin = $skinManager->getSkinById($id)->fetch();

if (!$skin) {
    echo "<div>Skin not found : <a href='index.php'>Return to homepage</a></div>";
    exit;
}

?>
<body>
    <div class="skin-information">
        <div class="img_slot">
            <a target="_blank" href="image/hero/<?= $skin['image_url'] ?>"><img src="image/hero/<?= $skin['image_url'] ?>" alt="<?= $skin['skin_name'] ?>"></a>
        </div>
        <section>
            <h1><?= $skin['skin_name'] ?></h1>
            <p>Hero: <a href="hero.php?id=<?= $skin['id_hero'] ?>" target="_blank"><?= $skin['hero_name'] ?></a></p>
            <p>Category: <a href="category?id=<?= $skin['id_category'] ?>"><?= $skin['category_name'] ?></a></p>
            <p>Rarity: <span class="<?= $skin['rarity'] ?>-skin"><?= $skin['rarity'] ?></span></p>
            <?php if ((!empty($skin['chapter_name']))): ?>
                <p><?= $skin['chapter_name'] ?></p>
            <?php endif;?>
            <?php if (!empty($skin['season_name'])): ?>
                <p><?= $skin['season_name'] ?></p>
            <?php endif; ?>
            <?php if (!empty($skin['year'])): ?>
                <p>Year: <?= $skin['year'] ?></p>
            <?php endif; ?>
            <?php if (!empty($skin['recolor_of'])): ?>
                <p>Recolor of: <a href="skin.php?id=<?= $skin['recolor_of'] ?>" target="_blank"><?= $skin['recolor_name'] ?></a></p>
            <?php endif; ?>
            <?php if (!empty($skin['condition_name'])): ?>
                <p>Special Condition: <?= $skin['condition_name'] ?></p>
            <?php endif; ?>
            <a href="index.php" class="back-home">← Back to Home</a>
        </section>
    </div>

</body>
</html>