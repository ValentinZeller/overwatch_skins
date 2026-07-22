<?php require_once('controller/StatSkins.php'); ?>

<div class="row-header" style="background-image: url('image/hero_portrait/<?= $hero['portrait_url'] ?>');" title=<?= $hero['name'] ?> ></div>
<?php foreach ($headers as $header): ?>
    <div class="row-count" data-category="<?= $header['id'] ?>">
        <?php foreach ($rarities as $rarity): ?>
            <?php $filterSkinsRarity = $skinManager->filterSkinByRarity($rarity, $filterSkins); 
                $stat =  new StatSkins($filterSkinsRarity, $hero, $seasons);
                $resultRarity = $stat->results()[$header['id']] ?>
                <?php if ($resultRarity > 0): ?>
                    <p class="count <?= $rarity ?>-skin"><?= $resultRarity ?></p>
                <?php endif; ?>
        <?php endforeach; ?>
        <?php $stat = new StatSkins($filterSkins, $hero, $seasons); ?>
        <?php $result = $stat->results()[$header['id']] ?>
        <p class="count total"><?= $result ?></p>
    </div>
<?php endforeach; ?>