<?php require_once('function.php'); ?>

<div id="total" class="row total">
    <div class="row-header" style="background-image: url('https://foxyjr.cloudns.ph/overwatch_skins/image/category/total.webp');"></div>
    <?php foreach ($categories as $category): ?>
        <?php
            $filterSkin = $manager->filterSkinByCategory($category['name'], $skinData);
            $filterSkinCount = count($filterSkin);
            $nbColumn = getNbColumn($category, $maxSkinCategory);
        ?>
        <div class="row-count" data-category="<?= $category['name'] ?>" style="width: calc(var(--width) * <?= $nbColumn ?>);" >
            <?php echo template('template/rarity_count.php',[
                'rarities' => $rarities,
                'skinData' => $filterSkin,
                'manager' => $manager
            ]) ?>
        </div>
    <?php endforeach; ?>
    <div class="row-count">
        <?php echo template('template/rarity_count.php', [
            'rarities' => $rarities,
            'skinData' => $skinData,
            'manager' => $manager
        ]) ?>
    </div>
    <div class="row-header"></div>
</div>