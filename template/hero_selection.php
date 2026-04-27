<?php
require_once('controller/connect.php');
require_once('controller/HeroManager.php');
define('CACHE_PATH', 'cache/');
$db = ConnectBDD();
$heroManager = new HeroManager($db);
$heroes = initialValueHero($heroManager);
$roles = ['tank','damage','support'];

function initialValueHero($heroManager) {
    $list = null;
    if (file_exists(CACHE_PATH.'hero_main.php')) {
        // Load from cache
        $list = include(CACHE_PATH.'hero_main.php');
    } else {
        // Fetch from database and cache it
        $list = $heroManager->getListeHero();
        $list->setFetchMode(PDO::FETCH_ASSOC);
        $list = $list->fetchAll();
        file_put_contents(CACHE_PATH.'hero_main.php', '<?php return ' . var_export($list, true) . ';');
    }
    return $list;
}
?>

<div id="hero-selection">
    <?php foreach($roles as $role): ?>
        <div class="role">
            <?php foreach($heroes as $hero): ?>
                <?php if($role == $hero['role']): ?>
                    <a href="hero.php?id=<?= $hero['id'] ?><?= isset($_GET['ingame']) ? '&ingame' : '' ?>" style="color:var(--'<?= $hero['subrole'] ?>');">
                        <img src="<?= $hero['portrait_url'] ?>">
                    </a>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
    <?php endforeach; ?>
</div>