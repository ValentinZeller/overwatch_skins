<?php
require_once('connect.php');
require_once('skin/SkinManager.php');

$id = $_GET['id'] ?? null;
if ($id === null) {
    echo "No skin ID provided.";
    exit;
}

$db = ConnectBDD();
$skinManager = new SkinManager($db);
$skin = $skinManager->getSkinById($id)->fetch();

if (!$skin) {
    echo "Skin not found.";
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Overwatch Skins</title>
    <link rel="stylesheet" href="css/style.css" type="text/css"/>
    <link rel="icon" type="image/x-icon" href="image/logo.webp">
</head>
<body>
    <div class="skin-information">
        <img src="<?= $skin['image_url'] ?>" alt="<?= $skin['skin_name'] ?>">
        <h1><?= $skin['skin_name'] ?></h1>
        <p>Hero: <?= $skin['hero_name'] ?></p>
        <p>Category: <?= $skin['category_name'] ?></p>
        <p>Rarity: <?= $skin['rarity'] ?></p>
        <?php if (!empty($skin['recolor_of'])): ?>
            <p>Recolor of: <a href="skin.php?id=<?= $skin['recolor_of'] ?>" target="_blank"><?= $skin['recolor_name'] ?></a></p>
        <?php endif; ?>
    </div>
</body>
</html>