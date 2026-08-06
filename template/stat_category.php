<div id='category' class='row row-category'>
    <div class='row-header'></div>
    <?php foreach ($headers as $header): ?>
        <div onclick="sort(event, '<?= $header['id'] ?>_defaut');" 
            title="<?= $header['display'] ?>" 
            data-category="<?= $header['id'] ?>"
            data-sort="asc"
            class="item category category-title" 
            style="width: calc(var(--width));">
                <?= $header['display'] ?>
        </div>
    <?php endforeach; ?>
    <?php foreach ($categories as $category): ?>
        <div class='row-header'></div>
        <?php foreach ($headers as $header): ?>
            <div onclick="sort(event,'<?= $header['id'] ?>_<?= $category['id'] ?>');" 
                title="<?= $header['display'] ?>" 
                data-category="<?= $header['id'] ?>"
                data-sort="asc" 
                class="item category category-title" 
                style="width: calc(var(--width));">
                    <?= $header['display'] . ' ' . $category['name'] ?>
            </div>
        <?php endforeach ?>
    <?php endforeach ?>
    <div class="row-header"></div>
</div>