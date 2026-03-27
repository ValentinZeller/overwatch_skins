<?php require_once('function.php');?>

<div id='category' class='row row-category'>
    <div class='row-header'></div>
    <?php foreach ($categories as $category): ?>
        <?php $nbColumn = getNbColumn($category, $maxSkinCategory); 
        if (isset($category['start_date'])) {
            $category['name'] = explode('-',$category['start_date'])[0] . ' - ' . $category['name'];
        }
        ?>
        <?php if (isset($category['icon_url'])  && $category['icon_url']): ?>
            <div title="<?= $category['name'] ?>" data-category="<?= $category['name'] ?>" class="item category" style="background-image: url('<?= $category['icon_url'] ?>'); width: calc(var(--width) * <?= $nbColumn ?>);"></div>
        <?php else: ?>
            <div title="<?= $category['name'] ?>" data-category="<?= $category['name'] ?>" class="item category category-title" style="width: calc(var(--width) * <?= $nbColumn ?>);"><?= $category['name'] ?></div>
        <?php endif; ?>
    <?php endforeach; ?>
    <div class="item category category-title">Total</div>
    <div class="row-header"></div>
</div>