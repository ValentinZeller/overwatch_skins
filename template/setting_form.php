<h3>Filter :</h3>
<form method="post">
    <div id="filter-form">
        <div class="rarity-filter filter-section">
            <?php foreach ($rarityList as $rarity): ?>
                <label class="<?= $rarity ?>Skin rarity">
                    <input type="checkbox" name="rarity[]" value="<?= $rarity ?>" <?php echo (in_array($rarity, $rarities)&&$filtered['rarity'] ? "checked" : "") ?>>
                    <?= $rarity ?>
                </label>
            <?php endforeach; ?>
        </div>
        <div class="category-filter filter-section">
            <?php foreach ($categoryList as $category): ?>
                <label class="category">
                    <input type="checkbox" name="category[]" value="<?= $category['name'] ?>" <?php echo (in_array($category['name'], array_column($categories, 'name'))&&$filtered['category'] ? "checked" : "") ?>>
                    <?= $category['name'] ?>
                </label>
            <?php endforeach; ?>
        </div>
        <div class="hero-filter filter-section">
            <div id="select-buttons">
                <button type="button" class='select-hero' onclick="selectRole('tank')">Select Tanks</button>
                <button type="button" class='select-hero' onclick="selectRole('damage')">Select Damages</button>
                <button type="button" class='select-hero' onclick="selectRole('support')">Select Supports</button>
                <button type="button" class='select-hero' onclick="unselectHeroes()">Unselect All</button>
            </div>
            <!-- Doomfist role fix -->
            <?php foreach ($heroList as $hero): ?>
                <?php if ( $version == 'ow1' && $hero['name'] == 'Doomfist') { $hero['role'] = 'damage'; } ?>
                <label class="hero">
                    <input type="checkbox" data-role="<?= $hero['role'] ?>" name="hero[]" value="<?= $hero['name'] ?>" <?php echo (in_array($hero['name'], array_column($heroes, 'name'))&&$filtered['hero'] ? "checked" : "") ?>>
                    <img width="50px" src="<?= $hero['portrait_url'] ?>">
                </label>
            <?php endforeach; ?>
        </div>
        <div class="season-filter filter-section">
            <?php if ($version == 'ow2'): ?>
                <?php foreach ($seasonList as $season): ?>
                    <label class="season">
                        <input type="checkbox" name="season[]" value="<?= $season['id'] ?>" <?php echo (in_array($season['id'], $seasons)&&$filtered['season'] ? "checked" : "") ?>>
                        <?= $season['name'] ?>
                    </label>
                <?php endforeach; ?>
            <?php else: ?>
                <?php foreach (YEARS as $year): ?>
                    <label class="season">
                        <input type="checkbox" name="year[]" value="<?= $year ?>" <?php echo (in_array($year, $yearsSelected)&&$filtered['year'] ? "checked" : "") ?>>
                        <?= $year ?>
                    </label>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
    <div id="form-button">
        <button type="submit">Filter</button>
    </div>
</form>