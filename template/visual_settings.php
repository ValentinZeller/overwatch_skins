<div class="visual-settings">
    <span id='show-hide-text'>Show/Hide Rarity bar : </span>
    <?php foreach ($rarities as $rarity): ?>
        <label class="<?= $rarity ?>-skin rarity">
            <?= $rarity ?>
            <input type="checkbox" onchange="checkBarVisibility(event);" checked data-rarity="<?= $rarity ?>" />
        </label>
    <?php endforeach ?>
    <button class='select-hero' id="sort-count" data-sort="asc" onclick="sortHeroes('count')">Sort Heroes by Skin Amount</button>
    <button class='select-hero' id="sort-name" data-sort="asc" onclick="sortHeroes('name')">Sort Heroes Alphabetically</button>
    <button class='select-hero' id="sort-release-date" data-sort="desc" onclick="sortHeroes('release-date')">Sort Heroes by Release Date</button>
    <label>Category Colors <input type="checkbox" onchange="updateCategoryColor(event.target.checked);" checked id='categories-colors' /></label>
</div>