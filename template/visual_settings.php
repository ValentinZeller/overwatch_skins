<div class="visual-settings">
    <span id='show'>Show/Hide Rarity bar : </span>
    <?php foreach ($rarities as $rarity): ?>
        <label class="<?= $rarity ?>Skin rarity">
            <?= $rarity ?>
            <input type="checkbox" onchange="checkBarVisibility(event);" checked data-rarity="<?= $rarity ?>" />
        </label>
    <?php endforeach ?>
    <button class='select-hero' onclick="sortHeroesBySkinsAmount()">Sort Heroes by Skin Amount</button>
    <button class='select-hero' onclick="sortHeroesAlphabetically()">Sort Heroes Alphabetically</button>
    <button class='select-hero' onclick="sortHeroesByReleaseDate()">Sort Heroes by Release Date</button>
    <label>Category Colors <input type="checkbox" onchange="updateCategoryColor(event.target.checked);" checked id='categoriesColors' /></label>
</div>