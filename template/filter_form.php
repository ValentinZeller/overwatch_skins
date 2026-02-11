<?php define('SEASON_OFFSET', 20);
$legacyCategoryList = [];
$mainCategoryList = [];
$legacySeasonList = [];
$chapteredSeasonList = []; 

if ($version == 'base') {
    $mainCategoryList = $categoryList;
} else {
    foreach ($categoryList as $category) {
        if ($category['display_main_order'] == null) {
            $legacyCategoryList[] = $category;
        } else {
            $mainCategoryList[] = $category;
        }
    }
}

if ($version == 'main' || $version == null) {
    foreach ($seasonList as $season) {
        if ($season['id'] <= SEASON_OFFSET) {
            $legacySeasonList[] = $season;
        } else {
            $mainSeasonList[] = $season;
        }
    }
}

?>

<h3>Filter :</h3>
<form method="get">
    <div id="filter-form">
        <div class="rarity-filter filter-section">
            <?php foreach ($rarityList as $rarity): ?>
                <label class="<?= $rarity ?>-skin rarity">
                    <input type="checkbox" name="rarity[]" value="<?= $rarity ?>" <?php echo (in_array($rarity, $rarities)&&$filtered['rarity'] ? "checked" : "") ?>>
                    <?= $rarity ?>
                </label>
            <?php endforeach; ?>
        </div>
        <?php if ($version != 'base'): ?>
            <div class="category-filter filter-section">
                <?php if ($version == 'legacy' || $version == null): ?>
                    <details name="category" <?= ($version == 'legacy') ? 'open' : '' ?>>
                        <summary>Legacy Categories</summary>
                        <?php foreach ($legacyCategoryList as $category): ?>
                            <label class="category">
                                <input type="checkbox" name="category[]" value="<?= $category['name'] ?>" <?php echo (in_array($category['name'], array_column($categories, 'name'))&&$filtered['category'] ? "checked" : "") ?>>
                                <?= $category['name'] ?>
                            </label>
                        <?php endforeach; ?>
                    </details>
                <?php endif; ?>
                <?php if ($version == 'main' || $version == null): ?>
                    <details name="category" open>
                        <summary>Categories</summary>
                        <?php foreach ($mainCategoryList as $category): ?>
                            <label class="category">
                                <input type="checkbox" name="category[]" value="<?= $category['name'] ?>" <?php echo (in_array($category['name'], array_column($categories, 'name'))&&$filtered['category'] ? "checked" : "") ?>>
                                <?= $category['name'] ?>
                            </label>
                        <?php endforeach; ?>
                    </details>
                <?php endif; ?>
            </div>
        <?php endif; ?>
        <div class="hero-filter filter-section">
            <div id="select-buttons">
                <button type="button" class='select-hero' onclick="unselectHeroes()">Unselect All</button>
                <button type="button" class='select-hero' onclick="selectRole('tank')">Select Tanks</button>
                <button type="button" class='select-hero' onclick="selectRole('damage')">Select Damages</button>
                <button type="button" class='select-hero' onclick="selectRole('support')">Select Supports</button>
            </div>
            <?php foreach ($heroList as $hero): ?>
                <?php if ( $version == 'legacy' && $hero['name'] == 'Doomfist') { $hero['role'] = 'damage'; } ?><!-- Doomfist role fix -->
                <label class="hero" <?= ($version != 'legacy') ? 'style="color:var(--'.$hero['subrole'].');"' : '' ?>>
                    <input type="checkbox" data-role="<?= $hero['role'] ?>" name="hero[]" value="<?= $hero['name'] ?>" <?php echo (in_array($hero['name'], array_column($heroes, 'name'))&&$filtered['hero'] ? "checked" : "") ?>>
                    <img width="50px" src="<?= $hero['portrait_url'] ?>">
                </label>
            <?php endforeach; ?>
        </div>
        <div class="season-filter filter-section">
            <?php if ($version == 'legacy' || $version == null): ?>
                <details name="season" <?= ($version == 'legacy') ? 'open' : '' ?>>
                    <summary>Legacy Years</summary>
                    <?php foreach (YEARS as $year): ?>
                        <label class="season">
                            <input type="checkbox" name="year[]" value="<?= $year ?>" <?php echo (in_array($year, $yearsSelected)&&$filtered['year'] ? "checked" : "") ?>>
                            <?= $year ?>
                        </label>
                    <?php endforeach; ?>
                </details>
            <?php endif; ?>
            <?php if ($version == 'main' || $version == null): ?>
                <details name="season" id="legacy-season">
                    <summary>Legacy Seasons</summary>
                    <?php foreach ($legacySeasonList as $season): ?>
                        <label class="season">
                            <input type="checkbox" name="season[]" value="<?= $season['id'] ?>" <?php echo (in_array($season['id'], $seasons)&&$filtered['season'] ? "checked" : "") ?>>
                            <?= $season['name'] ?>
                        </label>
                    <?php endforeach; ?>
                </details>
            <?php foreach ($chapterList as $chapter): ?>
                <details name="season" <?= (count($chapterList) == $chapter['id']) ? 'open' : '' ?>>
                    <summary><?= $chapter['name'] ?></summary>
                    <?php foreach ($mainSeasonList as $season): ?>
                        <label class="season">
                            <input type="checkbox" name="season[]" value="<?= $season['id'] ?>" <?php echo (in_array($season['id'], $seasons)&&$filtered['season'] ? "checked" : "") ?>>
                            <?= $season['name'] ?>
                        </label>
                    <?php endforeach; ?>
                </details>
            <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
    <div id="form-button">
        <label class="recolor-label" for="no-recolor" id="no-recolor-label" >No Recolors
            <input type="checkbox" id="no-recolor" name="no-recolor" <?= $filtered['no-recolor'] ? "checked" : '' ?>/>
        </label>
        <label class="recolor-label" for="recolor-only" id="recolor-only-label">Only Recolors
            <input type="checkbox" id="recolor-only" name="recolor-only" <?= $filtered['recolor-only'] ? "checked" : '' ?>/>
        </label>
        <button type="submit">Filter</button>
    </div>
</form>