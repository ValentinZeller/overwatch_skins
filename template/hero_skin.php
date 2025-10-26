<?php require_once('function.php'); ?>

<div class="row" id="<?= $hero['name'] ?>" data-count="<?= count($manager->filterSkinByHero($hero['name'], $skinData)) ?>">
    <div class="rowHeader" style="background-image: url('<?= $hero['portrait_url'] ?>');"></div>
    <?php foreach ($categories as $category): ?>
        <?php
            $nbColumn = getNbColumn($category, $maxSkinCategory, $manager);
        ?>
        <div data-category="<?= $category['name'] ?>" class="cell " style="width: calc(var(--width) * <?= $nbColumn ?>);">
            <?php
                $filterSkin = $manager->filterSkinByHeroAndCategory($hero['name'], $category['name'], $skinData);
                $filterSkinCount = count($filterSkin);
                if ( $filterSkinCount > 0 ):
                    foreach ( $filterSkin as $skin ): ?>
                        <a target="_blank" href="<?= $skin['image_url'] ?>">
                            <?php
                                $skin['image_url'] = str_replace("'", "\'", $skin['image_url']);
                            ?>
                            <div class="<?= split($filterSkinCount, $nbColumn) ?> <?= $skin['rarity'] ?>" data-bg="url('<?= renameFile($skin['image_url']) ?>')" title="<?= $skin['skin_name'] ?>"></div>
                        </a>
                    <?php endforeach;
                else: ?>
                    <div class="item"></div>
                <?php endif; ?>
        </div>
    <?php endforeach; ?>
    <div class="rowCount">
        <?php echo template('template/rarity_count.php', [
            'rarities' => $rarities,
            'skinData' => $manager->filterSkinByHero($hero['name'],$skinData),
            'manager' => $manager
        ]) ?>
    </div>
    <div class="rowHeader" style="background-image: url('<?= $hero['portrait_url'] ?>');"></div>
</div>