<div class="visual-bar">
    <span id='show'>Show/Hide Rarity bar : </span>
    <?php foreach ($rarities as $rarity): ?>
        <label class="<?= $rarity ?>Skin rarity">
            <?= $rarity ?>
            <input type="checkbox" onchange="manageBar(event);" checked data-rarity="<?= $rarity ?>" />
        </label>
    <?php endforeach ?>
    <button class='select-hero' onclick="sortHeroes()">Sort Heroes by Skin Amount</button>
    <button class='select-hero' onclick="sortAlph()">Sort Heroes Alphabetically</button>
    <label>Category Colors <input type="checkbox" onchange="updateCategoryColor(event.target.checked);" checked id='categoriesColors' /></label>
</div>