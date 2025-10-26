<?php require_once('function.php'); ?>
<style>
<?php foreach ($categories as $category): ?>
    <?php $nbColumn = getNbColumn($category, $maxSkinCategory); ?>
    [data-category="<?= $category['name'] ?>"] { background-color: <?= randomColor($category['id']) ?>; }
<?php endforeach; ?>
</style>