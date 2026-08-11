<?php require_once('function.php'); ?>
<style>
<?php foreach ($categories as $category): ?>
    [data-category="<?= $category['name'] ?>"] { background-color: <?= randomColor($category['id']) ?>; }
<?php endforeach; ?>
</style>