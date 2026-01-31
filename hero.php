<?php
require_once('connect.php');
require_once('skin/SkinManager.php');

$id = $_GET['id'] ?? null;
if ($id === null) {
    echo "No hero ID provided.";
    exit;
}

$db = ConnectBDD();
$skinManager = new SkinManager($db);
$skins = $skinManager->getSkinByHeroId($id)->fetchAll();


if (!$skins) {
    echo "Skin not found.";
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Hero Gallery</title>
    <link rel="stylesheet" href="css/style.css" type="text/css"/>
    <link rel="icon" type="image/x-icon" href="image/logo.webp">
</head>
<body>
    <div id="hero-gallery">
        <?php
        foreach ($skins as $skin) {
            $skin['image_url'] = str_replace("'", "\'", $skin['image_url']);
            ?>
            <a target="_blank" href="skin.php?id=<?= $skin['id'] ?>">
                <div width=480px height=480px class="item-gallery <?= $skin['rarity'] ?> <?= $skin['recolor_of'] ? 'recolor' : '' ?>" title="<?= $skin['skin_name'] ?>" style="background-image: url('<?= $skin['image_url'] ?>');">
                    <img class="category-icon" src="<?= $skin['category_icon_url'] ?>">
                </div>
            </a>
        <?php
        }
        ?>
    </div>
</body>
</html>