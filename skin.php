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
require_once('connect.php');
require_once('skin/SkinManager.php');

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
        <img src="<?= $skin['image_url'] ?>" alt="<?= $skin['skin_name'] ?>">
        <h1><?= $skin['skin_name'] ?></h1>
        <p>Hero: <a href="hero.php?id=<?= $skin['id_hero'] ?>" target="_blank"><?= $skin['hero_name'] ?></a></p>
        <p>Category: <?= $skin['category_name'] ?></p>
        <p>Rarity: <?= $skin['rarity'] ?></p>
        <?php if (!empty($skin['recolor_of'])): ?>
            <p>Recolor of: <a href="skin.php?id=<?= $skin['recolor_of'] ?>" target="_blank"><?= $skin['recolor_name'] ?></a></p>
        <?php endif; ?>
        <?php if (!empty($skin['condition_name'])): ?>
            <p>Special Condition: <?= $skin['condition_name'] ?></p>
        <?php endif; ?>
    </div>
    <a href="index.php" class="back-home">← Back to Home</a>
</body>
</html>