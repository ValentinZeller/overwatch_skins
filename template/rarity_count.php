<?php foreach( $rarities as $rarity ): ?>
    <?php $filterSkin = $manager->filterSkinByRarity($rarity, $skinData); ?>
    <?php $filterSkinCount = count($filterSkin); ?>
    <?php if ($filterSkinCount > 0): ?>
        <p class="count <?= $rarity ?>Skin"><?= $filterSkinCount ?></p>
    <?php endif; ?>
<?php endforeach; ?>
<p class="count"><?= count($skinData) ?></p>