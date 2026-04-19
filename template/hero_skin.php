<?php require_once('function.php');?>
<div class="row" id="<?= $hero['name'] ?>" data-name="<?= $hero['name'] ?>" data-release-date="<?= $hero['release_date'] ?>" data-count="<?= count($manager->filterSkinByHero($hero['name'], $skinData)) ?>">
   <a href="hero.php?id=<?= $hero['id'] ?>" target="_blank">
        <div class="row-header" style="background-image: url('<?= $hero['portrait_url'] ?>');" title=<?= $hero['name'] ?> ></div>
   </a>
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
                            <div class="<?= split($filterSkinCount, $nbColumn) ?> <?= $skin['rarity'] ?> <?= $skin['recolor_of']? 'recolor' : ''  ?>" title="<?= $skin['skin_name'] ?>"
                                <?php if (isset($_GET['screenshot'])): ?>
                                    style="background-image: url('<?= renameFile($skin['image_url']) ?>');"
                                <?php else: ?>
                                    data-bg="url('<?= renameFile($skin['image_url']) ?>')"
                                <?php endif; ?>
                                <?php if (isset($skin['id_season']) && $skin['id_season']):?> 
                                    data-recent="<?= number_format($skin['id_season']/21,3)?>"
                                <?php endif; ?>
                            >
                                <?php if (array_key_exists('category_icon_url',$skin)): ?>
                                    <?php if ($skin['category_icon_url']): ?>
                                        <img loading="lazy" class="category-icon" src="<?= $skin['category_icon_url'] ?>">
                                    <?php elseif (!$skin['category_icon_url']): ?>
                                        <?php $skin['category_name'] = substr($skin['category_name'],0,6) ?>
                                        <span title="<?= $skin['category_name']?>" data-category="<?= $skin['category_name'] ?>" class="item season-category"><?= $skin['category_name'] ?></span>
                                    <?php endif; ?>
                                <?php endif; ?>
                            </div>
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
    <a href="hero.php?id=<?= $hero['id'] ?>" target="_blank">
        <div class="row-header" style="background-image: url('<?= $hero['portrait_url'] ?>');" title=<?= $hero['name'] ?> ></div>
    </a>
</div>