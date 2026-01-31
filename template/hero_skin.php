<?php require_once('function.php'); ?>

<div class="row" id="<?= $hero['name'] ?>" data-name="<?= $hero['name'] ?>" data-release-date="<?= $hero['release_date'] ?>" data-count="<?= count($manager->filterSkinByHero($hero['name'], $skinData)) ?>">
   <a href="hero.php?id=<?= $hero['id'] ?>" target="_blank"><div class="row-header" style="background-image: url('<?= $hero['portrait_url'] ?>');" title=<?= $hero['name'] ?> ></div></a>
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
                        <a target="_blank" href="skin.php?id=<?= $skin['id'] ?>">
                            <?php
                                $skin['image_url'] = str_replace("'", "\'", $skin['image_url']);
                            ?>
                            <div class="<?= split($filterSkinCount, $nbColumn) ?> <?= $skin['rarity'] ?> <?= $skin['recolor_of']? 'recolor' : ''  ?>" data-bg="url('<?= renameFile($skin['image_url']) ?>')" title="<?= $skin['skin_name'] ?>"></div>
                        </a>
                    <?php endforeach;
                else: ?>
                    <div class="item"></div>
                <?php endif; ?>
        </div>
    <?php endforeach; ?>
    <div class="row-count">
        <?php echo template('template/rarity_count.php', [
            'rarities' => $rarities,
            'skinData' => $manager->filterSkinByHero($hero['name'],$skinData),
            'manager' => $manager
        ]) ?>
    </div>
    <div class="row-header" style="background-image: url('<?= $hero['portrait_url'] ?>');"></div>
</div>