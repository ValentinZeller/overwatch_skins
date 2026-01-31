<?php require_once('function.php'); ?>

<div id='category' class='row row-category'>
    <div class='row-header'></div>
    <?php foreach ($categories as $category): ?>
        <?php $nbColumn = getNbColumn($category, $maxSkinCategory); ?>
        <div title="<?= $category['name'] ?>" data-category="<?= $category['name'] ?>" class="item category" style="background-image: url('<?= $category['icon_url'] ?>'); width: calc(var(--width) * <?= $nbColumn ?>);"></div>
    <?php endforeach; ?>
    <div class="item category" style="background-image: url('https://foxyjr.cloudns.ph/overwatch_skins/image/category/total.webp');"></div>
    <div class="row-header"></div>
</div>